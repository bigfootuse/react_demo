<?php

namespace App\Http\Controllers\Auth;

use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Requests\ValidateSecretRequest;
use App\User;
use Sentinel;
use App\Models\UserActivity;


class AuthController extends Controller
{
    protected $redirectTo = '/dashboard';
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function getValidateToken()
    {
        if (session('2fa:user:id')) {
            return view('auth/validate');
        }
        return redirect('login');
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function postValidateToken(ValidateSecretRequest $request)
    {

        //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        //use cache to store token to blacklist
        Cache::add($key, true, 4);

        //login and redirect user
        $sentinel = app('sentinel');
        $user = $sentinel->findById($userId);
        $sentinel->login($user);


        //  return redirect()->intended($this->redirectTo);
        return redirect('dashboard');
    }

    public function postValidateTokenDesable(ValidateSecretRequest $request)
    {

        //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        //use cache to store token to blacklist
        Cache::add($key, true, 4);

        //login and redirect user
        $sentinel = app('sentinel');
        $user = $sentinel->findById($userId);
        $sentinel->login($user);


        return 1;
    }

    public function postValidateTokenenable(ValidateSecretRequest $request)
    {

        //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        //use cache to store token to blacklist
        Cache::add($key, true, 4);

        //login and redirect user
        $sentinel = app('sentinel');
        $user = $sentinel->findById($userId);
        $sentinel->login($user);



        return 1;
    }

    public function postValidateTokenuser(ValidateSecretRequest $request)
    {

      //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        //use cache to store token to blacklist
        Cache::add($key, true, 4);

        //login and redirect user
        $sentinel = app('sentinel');
        $user = $sentinel->findById($userId);
        $sentinel->login($user);
        $key=str_random(10);

        $users = User::find(Sentinel::getuser()->id);
        $users->key_2fa = $key;
        $users->save();

        return $key;
    }
}
