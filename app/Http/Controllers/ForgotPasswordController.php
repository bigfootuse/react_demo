<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use Reminder;
use Activation;
use Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        if(Sentinel::check()) {
            if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
                return redirect('admin/dashboard');
            elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user')
                return redirect('dashboard');
        }

        else
            return view('auth.forgotpassword.index');
	} 
    public function store(Request $request)
    {
  		$this->validate($request,[
  			'email' => 'required|string|email|max:255',
  		]);	

     $user = User::where('email', $request->email)->first(['id', 'status']);

      if($request->email) {
            $email = User::where('email', $request->email)->first();
            if(is_null($email)){
                return redirect()->back()->with(['error' => "Please Enter Register Email Id!" ]);
            }
      }
      $act = Activation::where('user_id', $user->id)->first(['completed', 'suspend_by']);
          if ($act->completed == 1 && $act->suspend_by != 0) 
          {
              return redirect()->back()->with(['error' => "You account is Suspended !"]);
          } else if ($act->completed == 0) 
          {
              return redirect()->back()->with(['error' => "Your account is not activated !!!"]);
          } else if ($act->completed == 1 && $user->status == 0)
          {               
              return redirect()->back()->with(['error' => "Your account is Block !!!"]);
          
          } 

  		$user=User::whereEmail($request->email)->first();
  		if(count($user)>0)
  		{
  			$sentinelUser =Sentinel::findById($user->id);
  			if(count($user) == 0)
  				  return redirect()->back()->with(['success' => 'Password reset code already send your mail, Please check email.']);
  			$reminder=Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
  			$code=$reminder->code;
  			//return view('emails.forgot_password', compact('user', 'code'));
  			$this->sendEmail($user, $reminder->code);
  			return redirect()->back()->with(['success' => "Reset link was sent to your email. "]);
  		}else{
  			return redirect()->back()->with(['error' => 'This Email is not found, Please Enter Register Email.']);
  		}		
    }
    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot_password', [
            'user' => $user,
            'code' => $code
         ], function($message) use ($user)
         {
            $message->to($user->email);
            $message->subject("Hello $user->user_name, reset your password.");
         });
    }

    public function show($email, $resetcode)
    {
    	$user = User::byEmail($email);
    	if(count($user) == 0)
    		  abort(404);
     	$sentinelUser = Sentinel::findById($user->id);
      	if($reminder = Reminder::exists($sentinelUser))
      	{
      		if($resetcode == $reminder->code)
      		{
      			return view('auth.forgotpassword.resetPassword', compact('user', 'resetcode'));
      		}else{
      		    return redirect('/');
      		}
		}else{
    		return redirect('/');
    	}
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    	'email' => 'required|string|email|max:255',    	
      'password' => 'required|string|min:8|max:32',                  
      'confirm_password' =>'required|min:8|same:password',
        'resetcode' => 'required',
    	]);

    	$sentinelUser = Sentinel::findById($id);
    	// return $reminder = Reminder::exists($sentinelUser);

    	if($reminder = Reminder::complete($sentinelUser, $request->resetcode, $request->password))
    	{
    		Reminder::removeExpired();
    		// return $request->password; 
    		return redirect('/login')->with(['success' => "Your Password Reset Successfully. Please login with your new password."]);
    	}else{
    		return redirect('/login')->with(['error' => "Something went wrong. Please try again."]);
    	}

    }

}
