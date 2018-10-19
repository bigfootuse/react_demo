<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Sentinel;
use Mail;
use View;
use Validator;

class SubscriptionsController extends Controller
{

    public function __construct()
    {
        $this->s_coin = "VLC";
        $this->f_coin = "Volumecoin";
    }
    public function addSubscribe(Request $request)
   {


       $validator = Validator::make($request->all(), [
           'email' => 'required|email|max:255|unique:subscriptions',
       ]);

       if ($validator->fails()) {
           return 0;
       }

   		$is_present=Subscription::where("email" , $request->email)->first();
	    if($is_present){
	        return 0;
	    }
	    $subscribe = new Subscription;
	    $subscribe->email = $request->email;
	    $subscribe->save();
	    $user=$subscribe->email;
	    try {
	      // Sending an Email to the Subscriber
//	    	 return view('emails.subscription', compact('user'));
	       Mail::send('emails.subscription', [
	        'user' => $request->email,
	      ], function ($message) use($request) {
	        $message->to($request->email);
	        $message->subject("$this->f_coin Subscription");
	      });
	      // Adding Subscriber to the mailchimp
	      // Newsletter::subscribe($request->email);
	    } catch (\Exception $e) {
	      \Log::error($e->getMessage());
	    }    	
    	return 1;
    } 

    public function subscribers_list()
   {
        $subscribe =Subscription::get()->all(); 
        return view('admin.subscriber_list',compact('subscribe')); 
   }
   public function delete($id)
   {
      Subscription::find($id)->delete();
      return redirect()->back()->with("success","Subscriber delete");
   }

}
