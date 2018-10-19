<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\CoinAddress;
use App\Models\Deposit;
use App\CoinPaymentsAPI;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Sentinel;


class PaymentController extends Controller
{

    public function IpnHandler(Request $request)
    {

        Storage::disk('local')->put($request->txn_id.'-- '.$request->received_confirms."-".$request->ipn_type.'- new -.txt', json_encode($request->all()));

        $cps = new CoinPaymentsAPI();
        $setting = Setting::first();
        $cps->Setup($setting->private_key,$setting->public_key);

        if($request->ipn_type == 'deposit')
        {
            $deposit = Deposit::where('txid',$request->txn_id)->first();
            if($request->address)
            {
                $addressdata=CoinAddress::where('address',$request->address)->first();
                if(!empty($addressdata))
                {
                    $userdata=User::where('id',$addressdata->user_id)->first();
                    if(empty($deposit) && $userdata) // check condition that deposit is empty & found userdata
                    {

                        $deposit=new Deposit;
                        $deposit->user_id=$userdata->id;
                        $deposit->amount = $request->amount;
                        $deposit->txid = $request->txn_id;
                        $deposit->address = $request->address;
                        $deposit->coin_type = $request->currency;
                        $deposit->status =$request->confirms;
                        $deposit->save();
                    }
                }

                if($request->status >= 100){
                    if($request->txn_id)
                    {
                        $deposit = Deposit::where('txid',$request->txn_id)->first();
                        if($deposit){
                            if($request->status >=100){
                                $userid = $deposit->user_id;

                                $dp = Deposit::find($deposit->id);
                                $dp->status = 100;
                                $dp->amount = $request->amount;
                                $dp->status = $request->confirms;
                                $dp->save();

                                $user = User::find($userid);
                                $coinname = strtolower($dp->coin);
                                $temp='';
                                $temp='total_'.$coinname.'_bal';
                                $user->$temp =  $user->$temp + $request->amount;
                                $user->save();

                                $this->sendDepositEmail($user,$dp);
                                die('IPN OK');
                            }
                        }
                    }
                }else if($request->status == -1){
                    $deposit = Deposit::where('txid',$request->txn_id)->first();
                    if($deposit){
                        $userid = $deposit->user_id;
                        $dp = Deposit::where('txid',$request->txn_id)->update(['status' => -1 ]); // update status to pending for complete
                    }
                }
            }
        }
        else if($request->ipn_type == 'withdrawal')
        {
            $withdraw=Withdraw::where('callback_id',$request->id)->first();
            $wid=$withdraw->id;
            $user_id=$withdraw->user_id;
            $coin = $withdraw->coin;
            $amount = $withdraw->amount;

            if($withdraw)
            {
                if($request->status==2 && ($withdraw->status==0 || $withdraw->status==1  ))
                {
                    $with=Withdraw::find($wid);
                    $with->admin_status=1; // Status Approve
                    $with->save();

                    $user=User::find($user_id);
                    $text = "Withdraw Accept";
                    Mail::send('emails.withdrawrequestapproved', [
                        'user' => $user,
                        'amount' => $amount,
                        'coin' => $coin,
                    ], function ($message) use ($user, $text) {
                        $message->to($user->email);
                        $message->subject("Hello $user->username, $text");
                    });


                }
                else if($request->status==-1)
                {
                    $coinname = strtolower($coin);  // User Balance Field make
                    $temp='total_'.$coinname.'_bal';

                    $user1=User::find($user_id);
                    $user1->$temp = $user1->$temp + $amount;  //User balance plus after withdraw reject
                    $user1->save();

                    $user=User::find($user_id);   //Send mail
                    $text = "Withdraw Reject";
                    Mail::send('emails.withdrawrequestreject', [
                        'user' => $user,
                        'amount' => $amount,
                        'coin' => $coin,
                    ], function ($message) use ($user, $text) {
                        $message->to($user->email);
                        $message->subject("Hello $user->username, $text");
                    });
                }
                else
                {   }

            }


        }
        else
        {

        }

    }

    private function sendDepositEmail($user, $dp) {
        Mail::send('emails.deposit', [
            'user' => $user,
            'dp' => $dp,
        ], function ($message) use ($user, $dp) {
            $message->to($user->email);
            $message->subject("Hello $user->username");
        });
    }


}
