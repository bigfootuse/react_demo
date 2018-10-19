<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use Activation;
use Validator;
use Mail;
use Session;

class RegisterController extends Controller
{
    public function register()
    {

        if(Sentinel::check()) {
            if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
                return redirect('admin/dashboard');
            elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user')
                return redirect('dashboard');
        }
        else
        	return view('auth.register');
    }
    public function registerPost(Request $request)
    {
    	$this->validate($request,[
    		'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sponser_code' => 'nullable|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:32',                  
            'confirm_password' =>'required|min:8|same:password',
            'g-recaptcha-response' => 'required',

		  ]); 	

        if($request->sponser_code) {
            $sponser = User::where('referral_code', $request->sponser_code)->first();
            if(is_null($sponser)){
                return redirect()->back()->with(['error' => "Please enter Valid Sponser Referral Code!", 'validator' => '1']);
            }
        }
            
    	$user=Sentinel::register(array(
    		'username' => $request->username,
    		'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password, 
            'referral_code' => str_random(16),
            'token_address' => str_random(16),
            'profile' => 'user.png',
    	));

        // $user->save();

        $parent_id=0;
		$activation = Activation::create($user);
        $role = Sentinel::findRoleByslug("user"); // role 2 for user
        $role->users()->attach($user);

        if($request->sponser_code)
        {
            $sponser_data = User::where('referral_code', $request->sponser_code)->first();
            if($sponser_data) {
                $parent_id = $sponser_data->id;
                User::where('email', $request->email)->update(array('parent_id' => $parent_id, 'username' => $request->username));
                $userdata = User::where('username', $request->username)->get();
            }
        }

       	$link = url('').'/activate/'.$request->email.'/'.$activation->code;
        $text = 'You  account successfully has been created';
     	// return view('emails.activation', compact('user','text','link'));
         $this->sendActivationEmail($user,$text,$link);
    	return redirect('/login')->with(['success' =>'Register Successfully, Check Your Email for Verification']);
    }

    private function sendActivationEmail($user,$text,$link)
	{
		Mail::send('emails.activation',[
			'user' => $user,
            'text' => $text,
            'link' => $link,
        ],function($message) use ($user, $text) {
            $message->to($user->email);
            $message->subject("Hello ,$user->first_name.'/'.$user->last_name, $text");
        });
	}

	public function activate($email, $activationCode){

        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        $user->status=1;
        $user->save();  
        if(Activation::complete($sentinelUser, $activationCode))
        {
      	 // return view('emails.welcome',compact('user'));
           Mail::send('emails.welcome',[
                'user' => $user,
            ],function($message) use ($user) {
                $message->to($user->email);
                $message->subject("Hello $user->username, your account is activated now ");
            });
            return redirect('/login')->with(['success'=>" Your account is successfully Activated !!!"]);
        }
        else{
            return redirect('/login')->with(['error'=>" This link is expires. please try to login !!!"]);
        }
    }

    public function subscribe()
    {
        return view('subscribe');
    }
    public function referral(Request $request, $ref)
    {
        $request->session()->put('referral', $ref);
        return redirect('register');
    }
}
