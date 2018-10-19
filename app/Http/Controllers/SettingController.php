<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Phase;
use App\User;
use Sentinel;


class SettingController extends Controller
{
    public function ico_edit()
    {
    	$setting=Setting::where('id', 1)->first();    	
    	return view('admin.setting.ico_setting', compact('setting'));
    }

    public function updateSetting(Request $request)
    {
    	$this->validate($request, [
    		'total_coins' =>'numeric|required',
    		'rate' =>'numeric|min:0|max:100',
    		'ref_percentage' => 'numeric|min:0|max:100',
    		'min_buy_token' => 'numeric|min:1',
    		'max_buy_token' =>'numeric|min:1',
    		'private_key' =>'required',
    		'public_key' =>'required'
    	]);

    	$setting=Setting::find(1);
    	$setting->total_coins=$request->total_coins;
    	$setting->ref_percentage=$request->ref_percentage;
    	$setting->min_buy_token =$request->min_buy_token;
    	$setting->max_buy_token =$request->max_buy_token;
    	$setting->private_key =$request->private_key;
    	$setting->public_key =$request->public_key;
    	$setting->save();

    	return redirect()->back()->with(['success' =>'ICO Setting Details Successfully Updated.']);
    }

    public function phases()
    {
    	$phase=Phase::orderBy('id', 'Asc')->get();
        $setting=Setting::find(1);
    	return view('admin.setting.phase', compact('phase','setting'));
    }

    public function phase_add_index()
    {
        return view('admin.setting.phase_add');
    }

    public function phase_add(Request $request)
    {
        $this->validate($request,[
            'start_date'=>'required',
            'end_date'=>'required',
            'name'=>'required',
            'usd_price'=>'required|regex:/^\d*(\.\d{1,2})?$/',
            'sold_coins'=>'required|numeric',
            'sold'=>'required|numeric',
            'bonus'=>'required|numeric',
        ]);
        $set=new Phase;
        $set->name=$request->name;
        $set->usd_price=$request->usd_price;
        $set->sold_coins=$request->sold_coins;
        
        if($set->sold <= $request->sold_coins)
        {           
            $set->sold=$request->sold;
        }else {
            return redirect()->back()->with(['error' => "Please Enter Valid Sold Tokens"]);
        }
        $set->bonus=$request->bonus;
        $set->start_date=$request->start_date;
        $set->end_date=$request->end_date;
        $set->save();
         return redirect('admin/phases')->with(['success'=>" Phase Add Successfully."]);
    }

    public function phase_edit_index($id)
    {
        $phase=Phase::where('id',$id)->first();
        return view('admin.setting.phase_edit',compact('phase'));
    }

    public function phase_update(Request $request)
    {
        $this->validate($request,[
            'usd_price'=>'|regex:/^\d*(\.\d{1,2})?$/',
        ]);
        
        $set=Phase::find($request->phase_id);
        // $set->name=$request->name;
        $set->usd_price=$request->usd_price;
        $set->sold_coins=$request->sold_coins;
        $set->sold=$request->sold;
        $set->bonus=$request->bonus;
        $set->start_date=$request->start_date;
        $set->end_date=$request->end_date;
        $set->update();

        if(Setting::find(1)->rate_id == $set->id )
         app('App\Http\Controllers\SettingController')->datesetting($set->id);

         return redirect('admin/phases')->with(['success'=>"Phase Update Successfully."]);  
    }

    public function phaseStatus($status, $id){
        $phase = Phase::find($id);
        $phase->status = 1;
        $phase->save();

        $setting                 = Setting::find(1);
        $setting->ico_start_date = $phase->start_date;
        $setting->ico_end_date   = $phase->end_date;
        $setting->rate           = $phase->usd_price;
        $setting->bonus          = $phase->bonus;
        $setting->rate_id        = $phase->id;
        $setting->update();

        return redirect()->back()->with('success',"Phase Active Successfully!");
    }

     public function add_Sold_Tokens(Request $request ,$id)
    {
        $phase = Phase::find($id);
        if($phase->sold_coins < $request->add_tokens+$phase->sold)
            return redirect()->back()->with('error',"tokens must be less then total tokens  ");

        $phase->sold = $request->add_tokens+$phase->sold;
        $phase->save();

        $setting = Setting::find(1);
        $setting->sold_coins = $setting->sold_coins+$request->add_tokens;
        $setting->save();

        $user = User::find(1);
        $user->total_coin_bal = $user->total_coin_bal+$request->add_tokens;
        $user->save();

        return redirect()->back()->with('success',"Phase Add Tokens Successfully!");
    }

    public function phase_delete($id)
    {
         $phase=Phase::find($id);
         $phase->delete();
        return redirect()->back()->with(['success'=>"Phase Delete Successfully."]);        
    }

    public function datesetting($id)
    { // get btc and eth price and set to setting peice

        $date = Phase::find($id);
        if($date){
            $setting = Setting::find(1);
            $setting->ico_start_date = $date->start_date;
            $setting->ico_end_date   = $date->end_date;
            $setting->rate           = $date->usd_price;
            $setting->bonus          = $date->bonus;
            $setting->rate_id        = $date->id;
            $setting->update();
        }
    }


    public function ratesetting()
    {
        $rate = Setting::find('1');
        if(strtotime($rate->ico_end_date)  <= time())
        {
            $rate = Phase::whereDate('start_date','>=',date("Y-m-d"))->orderby('start_date')->first();

            if($rate){
                $setting = Setting::find(1);
                $setting->ico_start_date = $rate->start_date;
                $setting->ico_end_date   = $rate->end_date;
                $setting->rate           = $rate->usd_price;
                $setting->bonus          = $rate->bonus;
                $setting->rate_id        = $rate->id;
                $setting->update();
            }

            Log::alert('date changes');
        }

    }



}
