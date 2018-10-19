<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use Activation;


class LoginController extends Controller
{
    public function login()
    {
        if(Sentinel::check()) {
            if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
                return redirect('admin/dashboard');

            elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user')
                return redirect('user/dashboard');
        }
        else
            return view('auth.login');
    }

    public function LoginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
            // 'g-recaptcha-response' => 'required',
        ]);
        
        try {
               $user = User::where('email', $request->email)->first(['id', 'status']);
               $act = Activation::where('user_id', $user->id)->first(['completed', 'suspend_by']);

            if ($user) {
                if ($user->status == 0 && $act->completed == 1) {
                    return redirect()->back()->with(['error' => "Your account is not Block!!!"]);
                }                  
                if ($act) {
                    if ($act->completed == 1 && $act->suspend_by != 0) {
                        return redirect()->back()->with(['error' => "You account is Suspended !"]);
                    } else if ($act->completed == 0) {
                        return redirect()->back()->with(['error' => "Your account is not activated !!!"]);
                    }
                } else {
                    return redirect()->back()->with(['error' => "Incorrect email. Please try again.."]);
                }

            } else {
                return redirect()->back()->with(['error' => "Incorrect email. Please try again."]);
            }

            if (Sentinel::authenticate($request->all())) {

                if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user') {
                    if (Sentinel::getUser()->google2fa_enable == 1) {
                        $request->session()->put('2fa:user:id', Sentinel::getUser()->id);
                        $this->logout();
                        return redirect('2fa/validate');
                    } else {

                        return redirect('dashboard');
                    }
                } else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') {

                    if (Sentinel::getUser()->google2fa_enable == 1) {
                        $request->session()->put('2fa:user:id', Sentinel::getUser()->id);
                        $this->logout();
                        return redirect('2fa/validate');
                    } else {

                        return redirect('admin/dashboard');
                    }


                } else {
                    return redirect()->back()->with(['error' => "Incorrect username or password. Please try again."]);
                }
            } else {
                return redirect()->back()->with(['error' => "Incorrect username or password. Please try again."]);

            }

        } catch(\Cartalyst\Sentinel\Checkpoints\ThrottlingException $e) {

            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "You are Banned for ".round($delay/60).' minuts']);
        } catch (NotActivatedException $e) {
            return redirect()->back()->with(['error' => "You account is not activated!"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => "Incorrect username or password. Please try again."]);
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }
}
