<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referal;
use App\Models\Setting;
use App\User;
use Sentinel;
use Activation;
use Mail;
use View;
use Reminder;

class ReferralController extends Controller
{
    public function index()
    {
        // Basics.
        $arr = array();
        $user= Sentinel::getUser();
        $userdata=User::where('id',$user->id)->where('status',3)->get();
        $i=0;$j=0;
        foreach ($userdata as $key1)
        {
            $arr[$i][$j]=0;
            $arr[$i][$j+1]=$key1->username.'('.$key1->given_ref_bal.')';
            $arr[$i][$j+2]= -1;
            $arr[$i][$j+3]= 17;
            //$arr[$i][$j+4]= $key1->email;
            $arr[$i][$j+4]= 'black';
        }

        $user_parent=User::where('parent_id',$user->id)->get();
        $i=1;
        foreach ($user_parent as $key2)
        {
            $k=0;
            $arr[$i][$k]=10+$i;
            $arr[$i][$k+1]=$key2->username.'('.$key2->given_ref_bal.')';
            $arr[$i][$k+2]=0;
            $arr[$i][$k+3]= 17;
            //$arr[$i][$k+4]= $key2->email;
            $arr[$i][$k+4]= 'green';
            $i++;
        }

        $final_array=(json_encode($arr));
        //  print_r($final_array);die;
        $users = User::where('parent_id',Sentinel::check()->id)->get();
        return view('user.referral',compact('final_array','users'));
    }
}

