<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Models\Setting;
use App\Models\Wallet;
use App\Models\Phase;
use App\User;
use Session;
use Carbon\Carbon;
use Mail;
use View;


class ICOcontroller extends Controller
{
    public function buytoken()
    {
        $user = Sentinel::getuser();
        $setting = Setting::find(1);
        $phase = Phase::orderBY('id')->get();
        $phase_date=Phase::find($setting->rate_id);
        $wallets = Wallet::with('user')->orderBy('id', 'DESC')->where('user_id', Sentinel::check()->id)->orderby('id','desc')->get();
        return view('user.token.index', compact('user', 'setting', 'phase', 'wallets','phase_date'));
    }

    public function icoInfo()
    {
        $setting = Setting::find(1);
        $phase =   Phase::orderBy('id')->get();
        $phaseStart = Phase::first();
        $phaseEnd = Phase::orderBy('id', 'desc')->first();
         $phase_date = Phase::find($setting->rate_id);
        return view('user.ico_info', compact('setting', 'phase', 'phaseStart', 'phaseEnd','phase_date'));
    }


    public function storeIco(Request $request)
    {   $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; // genrate txid
        $reset_string = substr(str_shuffle(str_repeat($alpha_numeric, 25)), 0, 25); // genrate txid
        $parent_id = User::find(Sentinel::check()->id)->parent_id;




         $setting_time = Setting::find(1);
         $phase =Phase::find($setting_time->rate_id);

        if($phase->sold_coins <= $phase->sold+$request->units)
        {
            Session::flash("error", "all coin sold out of this phase ");
            return redirect()->back();
        }


        if (time() < strtotime($setting_time->ico_start_date) || time() > strtotime($setting_time->ico_end_date)) {
            Session::flash('error', "not a valid action ");
            return redirect()->back();
        }
        $maxtoken = Setting::find(1)->max_buy_token;// set by user for max token
        $mintoken = Setting::find(1)->min_buy_token;// set by user for min token

        $now = Carbon::now();
        $before = $now->subHours(24);
        $old_check = Wallet::where('user_id', Sentinel::check()->id)->where("created_at", '>', $before)->sum("tokens");

        $tokens = $request->units;

        $mindld = Setting::find(1)->buy_min_token;// set by user for max dld coin
        if ($tokens <= $mindld) {
            Session::flash('error', "You have to buy  " . $mindld . " tokens  !!!");
            return redirect()->back();
        }

        if ($old_check + $tokens > $maxtoken) {
            Session::flash("error", "You can buy max " . $maxtoken . " tokens for every 24 hours !!!");
            return redirect()->back();
        }


         $rate = Phase::find(Setting::find(1)->rate_id);
         $sold_token = $rate->sold;

        if ($rate->sold_coins < $sold_token + $tokens) {
            $rate = Rate::find($setting_time->rate_id);
            $rate->status = 2; // update sold coins in setting table
            $rate->save();

            Session::flash('error', "All tokens already sold  ");
            return redirect()->back();
        }

        if ($request->coin_name =="BTC") {

            $rate = Setting::find(1)->rate;
            $btc = Setting::find(1)->btc_price; // 10000

            $total_btc = (($tokens * $rate)/ $btc);// total btc of token buy

            $myBTC = Sentinel::check()->total_btc_bal; // 0.50

            $bonus = $tokens*Setting::find(1)->bonus/100;

            if ($myBTC >= $total_btc || $request->buyall == "1") {

                if ($request->buyall == "1") {
                    $rate = Setting::find(1)->rate;
                    $total_usd = $btc * $myBTC;
                    $tokens = $total_usd / $rate;
                    $total_btc = $myBTC;
                }

                $user = user::find(Sentinel::check()->id);
                $user->total_btc_bal = $user->total_btc_bal - $total_btc;
                $user->total_coin_bal = $user->total_coin_bal + ($tokens+$bonus);
                $user->update();

                $wallet = new Wallet;
                $wallet->user_id = Sentinel::check()->id;
                $wallet->tokens = ($tokens+$bonus);
                $wallet->type = 1; // BTC
                $wallet->amount = $total_btc;
                $wallet->txid = $reset_string;
                $wallet->save();

                $setting = Setting::find(1);
                $setting->sold_coins = $setting->sold_coins + ($tokens+$bonus);// update sold coins in setting table
                $setting->save();

                $rate = Phase::find(Setting::find(1)->rate_id);
                $rate->sold = $rate->sold + ($tokens+$bonus); // update sold coins in setting table
                $rate->save();


                if ($user->parent_id) {

                    // refral balance
                    $parent = User::find($user->parent_id);
                    $rbal = $tokens * $setting->ref_percentage / 100;
                    $parent->total_coin_bal =$parent->total_coin_bal + $rbal;
                    $parent->total_ref_bal =$parent->total_ref_bal + $rbal;
                    $parent->save();

                    $user = user::find(Sentinel::check()->id);
                    $rbal = $tokens * $setting->ref_percentage / 100;
                    $user->given_ref_bal =$user->given_ref_bal + $rbal;
                    $user->save();

                    $setting = Setting::find(1);
                    $setting->sold_coins = $setting->sold_coins + $rbal; // update sold coins in setting table
                    $setting->save();

                    $rate = Phase::find(Setting::find(1)->rate_id);
                    $rate->sold = $rate->sold + $rbal; // update sold coins in setting table
                    $rate->save();
                }

                $type = Wallet::where('user_id', Sentinel::check()->id)->orderBy('id','desc')->first();
                $tokens = $tokens+$bonus;
                $this->sendBuyTokenEmail($user, $tokens, $type); //send email
                Session::flash('success', "$tokens Token Buy succssfully.");
                return redirect()->back();
            } else {
                Session::flash('error', "Please try again.");
                return redirect()->back();
            }
        }

        /************ with ETH ************/
        else if ($request->coin_name =="ETH") {

            $rate = Setting::find(1)->rate;
            $eth = Setting::find(1)->eth_price; // 10000

            $total_eth = (($tokens * $rate)/ $eth);// total eth of token buy

            $myETH = Sentinel::check()->total_eth_bal; // 0.50

            $bonus = $tokens*Setting::find(1)->bonus/100;

            if ($myETH >= $total_eth || $request->buyall == "1") {

                if ($request->buyall == "1") {
                    $rate = Setting::find(1)->rate;
                    $total_usd = $eth * $myETH;
                    $tokens = $total_usd / $rate;
                    $total_eth = $myETH;
                }

                $user = user::find(Sentinel::check()->id);
                $user->total_eth_bal = $user->total_eth_bal - $total_eth;
                $user->total_coin_bal = $user->total_coin_bal + ($tokens+$bonus);
                $user->update();

                $wallet = new Wallet;
                $wallet->user_id = Sentinel::check()->id;
                $wallet->tokens = ($tokens+$bonus);
                $wallet->type = 2; // ETH
                $wallet->amount = $total_eth;
                $wallet->txid = $reset_string;
                $wallet->save();

                $setting = Setting::find(1);
                $setting->sold_coins = $setting->sold_coins + ($tokens+$bonus);// update sold coins in setting table
                $setting->save();

                $rate = Phase::find(Setting::find(1)->rate_id);
                $rate->sold = $rate->sold + ($tokens+$bonus); // update sold coins in setting table
                $rate->save();


                if ($user->parent_id) {
                    // refral balance
                    $parent = User::find($user->parent_id);
                    $rbal = $tokens * $setting->ref_percentage / 100;
                    $parent->total_coin_bal =$parent->total_coin_bal + $rbal;
                    $parent->total_ref_bal =$parent->total_ref_bal + $rbal;
                    $parent->save();

                    $user = user::find(Sentinel::check()->id);
                    $rbal = $tokens * $setting->ref_percentage / 100;
                    $user->given_ref_bal =$user->given_ref_bal + $rbal;
                    $user->save();

                    $setting = Setting::find(1);
                    $setting->sold_coins = $setting->sold_coins + $rbal; // update sold coins in setting table
                    $setting->save();

                    $rate = Phase::find(Setting::find(1)->rate_id);
                    $rate->sold = $rate->sold + $rbal; // update sold coins in setting table
                    $rate->save();
                }

                $type = Wallet::where('user_id', Sentinel::check()->id)->orderBy('id','desc')->first();
//                return view("emails.buytoken",compact('user', 'tokens', 'type'));
                $tokens = $tokens+$bonus;
                $this->sendBuyTokenEmail($user, $tokens, $type); //send email
                Session::flash('success', "$tokens Token Buy Succssfully.");
                return redirect()->back();
            } else {
                Session::flash('error', "Please try again.");
                return redirect()->back();
            }
        }

    }
    private function sendBuyTokenEmail($user,$tokens,$type){
        Mail::send('emails.buytoken',[
            'user' => $user,
            'tokens' => $tokens,
            'type' => $type,
        ],function($message) use ($user, $tokens,$type) {
            $message->to($user->email);
            $message->subject("Hello $user->username, Buy Token");
        });
    }

}
