<?php

namespace App\Http\Controllers;

use Crypt;
use Google2FA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use \ParagonIE\ConstantTime\Base32;
use Sentinel;
use App\User;



class Google2FAController extends Controller
{
    use ValidatesRequests;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function enableTwoFactor(Request $request)
    {

        //generate new secret
        $secret = $this->generateSecret();

        //get user
        $user = Sentinel::getUser();
        $user->google2fa_secret = Crypt::encrypt($secret);
        $user->save();


        $url = $this->getQRCodeUrl('VolumeCoin(VLC)', $user->email, $secret);

        $url = $this->generateGoogleQRCodeUrl('https://chart.googleapis.com/', 'chart', 'chs=200x200&chld=M|0&cht=qr&chl=', $url);

        return $data = array('secret'=> $secret, 'imgurl'=>$url);



    }
    public function generateGoogleQRCodeUrl($domain, $page, $queryParameters, $qrCodeUrl)
    {
        $url = $domain.
            rawurlencode($page).
            '?'.$queryParameters.
            urlencode($qrCodeUrl);

        return $url;
    }
    public function getQRCodeUrl($company, $holder, $secret)
    {
        return 'otpauth://totp/'.rawurlencode($company).':'.rawurlencode($holder).'?secret='.$secret.'&issuer='.rawurlencode($company).'';
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function disableTwoFactor(Request $request)
    {
        $user = $request->user();
        //make secret column blank
        $user->google2fa_secret = NUll;
        $user->google2fa_enable = 0;
        $user->save();

        return redirect()->back()->with('success','Goggle 2fa code disable successfully  ');

    }

    /**
     * Generate a secret key in Base32 format
     *
     * @return string
     */
    private function generateSecret()
    {
        $randomBytes = random_bytes(10);

        return Base32::encodeUpper($randomBytes) ;
    }
    public function saveSecretKey(Request $request)//save  2fa key
    {
        $user = Sentinel::getUser();
        $user->google2fa_enable = 1;
        $user->save();
        return redirect()->back()->with('success','Goggle 2fa code enable successfully  ');
    }
}