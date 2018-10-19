<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\CoinPaymentsAPI;
use App\Models\Setting;
use App\Models\Phase;
use App\Models\Buytoken;
use App\Models\Wallet;
use DB;
use Carbon\Carbon;


class UserController extends Controller
{

    function home(){

        $setting_data=Setting::where('id',1)->first();
        $rate = Phase::where('id',$setting_data->rate_id)->first();
        $rate2 = $rate;
        $rates = Phase::get();
        if(strtotime($rate->end_date) < strtotime(date("Y-m-d H:i:s")))
            $rate = Phase::where('start_date','>=',$rate->end_date)->first();
        if(is_null($rate))
            $rate = $rate2;
        return view('frontend.home',compact('setting_data','rate','rates'));

    }

    public function dashboard()
    {

         $phase=Phase::orderBy('id', 'Asc')->select('name', 'sold_coins', 'sold', 'usd_price', 'bonus', 'start_date', 'end_date', DB::raw('DATEDIFF(start_date, CURDATE()) as days'))->take(4)->get();

        $now = Carbon::now();
        $before = $now->subHours(24);

        $buytokens=Wallet::with('userInfo')->limit(12)->orderby('id','desc')->where("created_at", '>', $before)->get();
        $phase = Phase::orderby('id')->get();

        try {
            $setting = Setting::first();
            $cp_helper = new CoinPaymentsAPI();
            $setup = $cp_helper->Setup($setting->private_key, $setting->public_key);
            $all = 1;
            $data = $cp_helper->api_call('balances', array('all' => $all));
            if($data && Sentinel::getUser()->roles()->first()->slug == 'admin' ){
                $btcwal = $data['result']['BTC']['balancef'];
                $ethwal = $data['result']['ETH']['balancef'];
            }
            else{
                $btcwal = Sentinel::getUser()->total_btc_bal;
                $ethwal = Sentinel::getUser()->total_eth_bal;
            }
            $coinbal = Sentinel::getUser()->total_coin_bal;


            $usdofbtc = Setting::find(1)->btc_price; // latest Bitcoin rate in USD
            $usdofeth = Setting::find(1)->eth_price; // latest Etherium rate in USD

            /*$setting = Setting::find(1);
            $rates = Rate::orderby('id')->get();
            $sold = $setting->sold_coins;
            $sold = ceil($sold / 1000000); // to get row from rates table
            if ($sold > 8) {
                $sold = 8;
            }*/





            return view('user.dashboard', compact('usdofbtc', 'usdofeth','coinbal','usdofbch',  'usd_rate', 'setting', 'rates', 'btcwal',  'ethwal','coin','buytokens','phase'));


        } catch (Exception $e) {

            return view('405');

        }

    }
}
