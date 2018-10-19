<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Activation;
use Sentinel;

class AdminController extends Controller
{
    public function user_index()
    {
    	$user=User::where('id','<>',1)->orderBy('created_at', 'DESC')->get();
    	return view('admin.user_index',compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success','Successfully Deleted User.');
    }

    public function user_status($status, $id)
    {
    	if($status == 1)
    	{
    		$temp='Block';
    		$user=Sentinel::getUser()->find($id);
    		$user->status=0;
    		$user->save();
    		// Activation::where('user_id', $id)->update('supend_by' =>1);
    	}
    	elseif($status==0)
    	{
    		$temp='Active';
    		$user=Sentinel::getUser()->find($id);
    		$user->status=1;
    		$user->save();
    		// Activation::where('user_id', $id)->update('supend_by' =>0);
    	}
    	else{   		
    	}

    	return redirect()->back()->with(['success' => 'User status '.$temp. ' Successfully']);
    }
}