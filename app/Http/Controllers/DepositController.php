<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoinAddress;
use App\Models\Deposit;
use App\Models\Setting;
use Sentinel;
use App\User;
use App\CoinPaymentsAPI;use Google2FA;


class DepositController extends Controller
{
    public function index($coin)
    {
        try{
            $user_id = Sentinel::getUser()->id;
            $address = Deposit::where('user_id',$user_id)->orderBy('created_at', 'DESC')->get();
            $user_address = User::where('id',$user_id)->orderBy('created_at', 'DESC')->first();
            if($coin == 'BTC'){  $usd_price = Setting::find(1)->btc_price; } // latest Bitcoin rate in USD
            if($coin == 'ETH'){  $usd_price = Setting::find(1)->eth_price;  } // latest Etherium rate in USD


            if ($coin == 'BTC' || $coin == 'ETH') {
                 $coinadd=CoinAddress::where('user_id',Sentinel::getUser()->id)->where('coin',$coin)->first();
                if(is_null($coinadd))
                {
                    $setting = Setting::first();
                    $cp_helper = new CoinPaymentsAPI();
                    $setup = $cp_helper->Setup($setting->private_key,$setting->public_key);
                    $req = array(
                        'currency' => $coin,
                        'ipn_url' => url('/ipn-handler'),
                    );
                     $result= $cp_helper->api_call('get_callback_address', $req);
                    if ($result['error'] == 'ok') {
                        $coin_address= new CoinAddress;
                        $coin_address->user_id = Sentinel::getUser()->id;
                        $coin_address->coin = $coin;
                        $coin_address->address=$result['result']['address'];
                        $coin_address->save();
                        $coinadd=CoinAddress::where('user_id',Sentinel::getUser()->id)->where('coin',$coin)->first();
                    }
                }
                $coinType = $coin;

                 $url = $this->getQRCodeUrl($coinadd->address);

                 $qrcode = $this->generateGoogleQRCodeUrl('https://chart.googleapis.com/', 'chart', 'chs=200x200&chld=M|0&cht=qr&chl=', $url);



                return view('user.wallet.deposit',compact('address','user_address','coinType','usd_price','coinadd','qrcode'));
            }
            return view('errors.error');
        } catch (Exception $e) {
            return view('errors.error');
        }


    }
    public function getQRCodeUrl($secret)
    {
        return 'otpauth://totp/'.$secret;
    }
    public function generateGoogleQRCodeUrl($domain, $page, $queryParameters, $qrCodeUrl)
    {
        $url = $domain.
            rawurlencode($page).
            '?'.$queryParameters.
            urlencode($qrCodeUrl);

        return $url;
    }

    public function getAllDeposit()
    {
          $deposit = Deposit::with('user_info')->orderBy('id', 'desc')->get();
        return view('admin.deposit', compact('deposit'));
    }

    
}
