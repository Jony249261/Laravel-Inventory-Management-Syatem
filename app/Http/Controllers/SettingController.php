<?php

namespace App\Http\Controllers;
use App\Setting;
use Image;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $setting = Setting::latest()->first();
        return view('setting.view-setting',compact('setting'));
    }


    public  function  Update(Request $request,$id){
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'company_email' => 'required|email',
            'company_country' => 'required|string|max:255',
            'company_city' => 'required|string|max:255',
            'company_logo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'company_phone'=>'required|numeric',
            'company_zipcode'=>'required|numeric',
        ]);
        $setting=Setting::findOrFail($id);
        $company_logo='company/'.$setting->company_logo;

        if ($request->has('company_logo')){
            if(file_exists(public_path($company_logo))){
                unlink($company_logo);
            }
            $company_logo=$request->file('company_logo');
            $name_gen=hexdec(uniqid()).'.'.$company_logo->getClientOriginalExtension();
            Image::make($company_logo)->resize(600,600)->save('company/'.$name_gen);
            $img_url='company/'.$name_gen;


        }


        $setting['company_name']  = $request -> company_name;
        $setting['company_email'] = $request->company_email;
        $setting['company_phone'] = $request->company_phone;
        $setting['company_address'] = $request->company_address;
        $setting['company_country']=$request->company_country;
        $setting['company_city']=$request->company_city;
        $setting['company_zipcode']=$request->company_zipcode;
        if ($request->has('company_logo')){
            $setting->company_logo=$img_url;
        }
        
        $setting->update();
        
        
        
        Session()->flash('success', 'Website Updated Successfully!.');
        return redirect()->back();



    }
}
