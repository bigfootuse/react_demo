<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\Setting;
use Sentinel;
use App\User;
use Mail;
use View;
use App\CoinPaymentsAPI;

class WithdrawController extends Controller
{


    private $version;

    public function __construct()
    {
        $this->s_coin = "VLC";
    }


    public function index($coin)
    {

        if (in_array($coin, ['BTC','ETH',$this->s_coin])) {
            $withdraws = Withdraw::where('user_id', Sentinel::getUser()->id)->where('coin', $coin)->orderBy('created_at', 'DESC')->get();
            return view('user.wallet.withdrawal', compact('coin', 'withdraws'));
        }
        else{
            return redirect()->to('wallet');
        }
    }

    public function postWithdraw(Request $request)
    {

         $key_2fa = Sentinel::getuser()->key_2fa;
        if($key_2fa != $request->key2fa && Sentinel::getuser()->google2fa_enable == 1 )
            return redirect()->back()->with('error','Sorry , There is something wrong with your withdrawal request!!');

        $key=str_random(10);
        $users = User::find(Sentinel::getuser()->id);
        $users->key_2fa = $key;
        $users->save();

        $this->validate($request, [
            'amount_withdraw'      => 'required',
            'address_withdraw'   => 'required',
        ]);

        if($this->s_coin == $request->coin_name)
        $this->validate($request, [
            'address_withdraw'      => 'erc20address',
           ]);




         $myBTC = Sentinel::check()->total_btc_bal;
         $myETH = Sentinel::check()->total_eth_bal;
         $myCoin = Sentinel::check()->total_coin_bal;

        $withdrawalamount =  $request->amount_withdraw;
        $type = $request->coin_name;


        if($type == 'BTC') {
             $btc_withdraw = $request->amount_withdraw;

            if($myBTC >= $btc_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $request->amount_withdraw;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();

                $left_balance = $myBTC - $btc_withdraw;
                $bal_coin_name='total_btc_bal';

                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);

                 $user =User::find(Sentinel::getUser()->id);

//                return view('email.withdrawrequest',compact('user','withdrawalamount','type','left_balance'));

                $this->sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance); //send email

                $this->sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type); //send email to admin


                // 	return redirect()->back()->with('success','Your withdraw of'.$request->amount_withdraw." ".$request->coin_name.'done successfully.');

                return redirect()->back()->with('success','Your withdraw Request for '.$request->amount_withdraw." ".$request->coin_name.' successfully. After Admin Confirm Request Amount will credited your address');

            } else {

                return redirect()->back()->with('error','Sorry , insufficient funds !!');

            }

        }



        if($request->coin_name=='ETH') {

            $eth_withdraw = $request->amount_withdraw;

            if($myETH>=$eth_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $request->amount_withdraw;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();



                $left_balance = $myETH - $eth_withdraw;

                $bal_coin_name='total_eth_bal';

                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);
                $user = User::find(Sentinel::getUser()->id);

//                 return view('emails.withdrawrequestadmin',compact('user','withdrawalamount','type','left_balance'));

//
                $this->sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance); //send email

                $this->sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type); //send email to admin

                // 	return redirect()->back()->with('success','Your withdraw of'.$request->amount_withdraw." ".$request->coin_name.'done successfully.');

                return redirect()->back()->with('success','Your withdraw Request for '.$request->amount_withdraw." ".$request->coin_name.' successfully. After Admin Approved Amount credited your address');

            } else {

                return redirect()->back()->with('error','Sorry , insufficient funds !!');

            }

        }


        if($request->coin_name==$this->s_coin) {


            $coin_withdraw = $request->amount_withdraw;

            if($myCoin>=$coin_withdraw ){

                $withdraw = new Withdraw;
                $withdraw->user_id = Sentinel::getUser()->id;
                $withdraw->coin = $request->coin_name;
                $withdraw->amount = $request->amount_withdraw;
                $withdraw->address = $request->address_withdraw;
                $withdraw->save();

                $left_balance = $myCoin - $coin_withdraw;

                $bal_coin_name='total_coin_bal';

                User::where('id',Sentinel::getUser()->id)->update([$bal_coin_name=>$left_balance]);
                $user = User::find(Sentinel::getUser()->id);

//                return view('emails.withdrawrequest',compact('user','withdrawalamount','type','left_balance'));
                $this->sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance); //send email

                $this->sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type); //send email to admin

                // 	return redirect()->back()->with('success','Your withdraw of'.$request->amount_withdraw." ".$request->coin_name.'done successfully.');

                return redirect()->back()->with('success','Your withdraw Request for '.$request->amount_withdraw." ".$request->coin_name.' successfully. After Admin Approved Amount credited your address');

            } else {
                return redirect()->back()->with('error','Sorry , insufficient funds !!');
            }
        }
    }

    //
    public function getAllWithdraw()
    {
          $Withdraw = Withdraw::with('user')->orderBy('id', 'desc')->get();
        return view('admin.withdrawal', compact('Withdraw'));
    }

    public function confirmStatus(Request $request)
    {
        $wid= $request->wid;
        $withdraw = Withdraw::find($wid);

        $amount_withdraw = $withdraw->amount;
        $coin_name = $withdraw->coin;
        $address_withdraw = $withdraw->address;
        $uid = $withdraw->user_id;


        $setting = Setting::find(1);

        if ($withdraw->coin == $this->s_coin)
        {
            $w = Withdraw::where('id',$wid)->update(['admin_status'=>1,'status'=>100,'txid'=>str_random(20),'withdraw_id'=>str_random(20)]);

            $user = User::find($uid);
//            return view('emails.withdrawrequestapproved',compact('user','amount_withdraw','coin_name'));
            $this->sendWithdrawalApprovedEmail($user,$amount_withdraw,$coin_name); //send email
            return 0;
        }

        $cp_helper = new CoinPaymentsAPI();
        $setup = $cp_helper->Setup($setting->private_key,$setting->public_key);
        $user = User::find($uid);
        $result = $cp_helper->CreateWithdrawal($amount_withdraw, $coin_name, $address_withdraw);


        if ($result['error'] == 'ok')
        {
            if($request->status== 100) {

                Withdraw::where('id', $wid)->update(['admin_status' => $request->status, 'status' => $result['result']['status'], 'withdraw_id' => $result['result']['id']]);

                $user = User::find($uid);

                $this->sendWithdrawalApprovedEmail($user, $amount_withdraw, $coin_name); //send email
                return 0;
            }

            else if($request->status==-1)
            {
                Withdraw::where('id', $wid)->update(['admin_status' => $request->status, 'status' => $result['result']['status'], 'withdraw_id' => $result['result']['id']]);

                $coinname = strtolower($withdraw->coin);  // User Balance Field make
                $temp = 'total'.$coinname.'_bal';

                $user1=User::find($uid);
                $user1->$temp = $user1->$temp + $amount_withdraw;  //User balance plus after withdraw reject
                $user1->save();

                $this->sendWithdrawalRejectEmail($user,$amount_withdraw,$user1->$temp,$withdraw->coin); //send email

                return 1;

            }

        } else {

            return 1;

        }

    }

    public function rejectStatus(Request $request)
    {

        $wid= $request->wid;

        $withdraw = Withdraw::find($wid);
        $amount = $withdraw->amount;
        $uid = $withdraw->user_id;
        $coin = $withdraw->coin;

        $user = User::where('id',$uid)->first();
        $btcbal = $user->total_btc_bal;
        $ethbal = $user->total_eth_bal;
        $coinbal = $user->total_coin_bal;

        Withdraw::where('id',$wid)->update(['admin_status'=>$request->status,'status'=>$request->status]);

        if($coin == 'BTC') {

            $balance = $btcbal + $amount;

            User::where('id',$uid)->update(['total_btc_bal'=>$balance]);

        }

        else if($coin == 'ETH') {

            $balance = $ethbal + $amount;

            User::where('id',$uid)->update(['total_eth_bal'=>$balance]);

        }

        else if($coin == $this->s_coin) {
            $balance = $coinbal + $amount;
            User::where('id',$uid)->update(['total_coin_bal'=>$balance]);
        }

        $user = User::find($uid);

//        return view('emails.rejectwithdrawrequest',compact('user','amount','balance','coin'));
        $this->sendWithdrawalRejectEmail($user,$amount,$balance,$coin); //send email

        return 0;

    }


private function sendWithdrawalReqAdminEmail($user,$withdrawalamount,$type){
        Mail::send('emails.withdrawrequestadmin',[
            'user' => $user,
            'withdrawalamount' => $withdrawalamount,
            'type' => $type,
        ],function($message) use ($user, $withdrawalamount,$type) {
            $message->to(User::find(1)->email);
            $message->subject("Hello admin, Withdraw Request");
        });
    }
    private function sendWithdrawalReqEmail($user,$withdrawalamount,$type,$left_balance){
//        return $user;

        Mail::send('emails.withdrawrequest',[
            'user' => $user,
            'withdrawalamount' => $withdrawalamount,
            'type' => $type,
            'left_balance' => $left_balance,
        ],function($message) use ($user, $withdrawalamount,$type,$left_balance) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Withdraw Request");
        });
    }
    private function sendWithdrawalApprovedEmail($user,$amount_withdraw,$coin_name){
        Mail::send('emails.withdrawrequestapproved',[
            'user' => $user,
            'amount_withdraw' => $amount_withdraw,
            'coin_name' => $coin_name,
        ],function($message) use ($user, $amount_withdraw,$coin_name) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Withdraw Approved");
        });
    }

    private function sendWithdrawalRejectEmail($user,$amount,$balance,$coin){
        Mail::send('emails.rejectwithdrawrequest',[
            'user' => $user,
            'amount' => $amount,
            'balance' => $balance,
            'coin' => $coin,
        ],function($message) use ($user, $amount,$balance,$coin) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Reject Withdraw Request");
        });
    }



}
