<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activation;
use Sentinel;
use App\User;
use Validator;
use Hash;
use Mail;
use File;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Sentinel::getuser();

        if($user->google2fa_enable == 0)
             $two_fa_code  = app('App\Http\Controllers\Google2FAController')->enableTwoFactor($request);
        else
            $two_fa_code = null;

        $secret="";
        $slug =  $user->roles;
        $slug =  $slug[0]['slug'];
        $user = Sentinel::getUser();
        return view('auth.profile',compact('user','secret','slug','two_fa_code'));
    }

    public function updatepic(Request $request,  $id)
    {
        
        $this->validate($request, [
          'photo'  => 'image|mimes:jpg,png,jpeg',
        ]);
        $user = User::find(Sentinel::getUser()->id);
        if (!is_null($request->photo)) {
          $old_photo = $request->old_photo;
          if($old_photo){
            if(File::exists(public_path('assets/images/user/'.$old_photo)))
              unlink(public_path('assets/images/user/'.$old_photo));
          }
          $file = $request->file('photo');
          $destinationPath = './assets/images/user/';
          $filename = time().$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $user->profile = $filename;
        }
        $user->save();
        return redirect()->back()->with(['success' => 'Your Profile Image updated successfully']);
      }

      public function update(Request $request, $id)
      {
        // return $request->all();
            $slug = Sentinel::getUser()->roles()->first()->slug;           

            $this->validate($request, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
            ]);
            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->save();
            return redirect()->back()->with('success','Profile updated successfully!');
      }

    public function updatePassword(Request $request, $id)
    {
        
        if (Sentinel::check()) 
        {
            // $id = Sentinel::getUser()->id;

            $validator = Validator::make($request->all(), [
                'old_password' => 'required|string|min:8',
                'new_password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8|same:new_password',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput()->with(['validator' => '1']);
            }

            $old_password = $request->old_password;
            $current_password = Sentinel::getUser()->password;
            if (Hash::check($old_password, $current_password)) {
                $user = User::find($id);
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect()->back()->with(['success' => 'Your Password updated successfully']);
            } else {
                return redirect()->back()->with(['error_old' => 'Invalid  Old password. Please try again', 'validator' => '1']);
            }
        } else {
            return redirect()->back()->with(['error' => 'login to change password ', 'validator' => '1']);
        }
    }
}
