<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Image;
use DB;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('customer.add-customer');
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'sometimes|nullable|email|unique:customers',
            'address' => 'required|string|max:255',
            'shopname' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'account_holder'=>'sometimes|nullable|string',
            'account_number'=>'sometimes|nullable|numeric',
            'bank_name'=>'sometimes|nullable|string',
            'bank_branch'=>'sometimes|nullable|string',
            'city'=>'required|string|max:255',
        ]);

        
       $img_url = null;
       if($request->has('photo')){
           $photo=$request->file('photo');
           $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
           Image::make($photo)->save('admin/images/customers/'.$name_gen);
           $img_url='admin/images/customers/'.$name_gen;
       }


        
//        
        $customer=array();
        $customer['name']  = $request -> name;
        $customer['email'] = $request->email;
        $customer['phone'] = $request->phone;
        $customer['address'] = $request->address;
        $customer['photo']=$img_url;
        $customer['shopname']=$request->shopname;
        $customer['account_holder']=$request->account_holder;
        $customer['account_number']=$request->account_number;
        $customer['bank_name']=$request->bank_name;
        $customer['bank_branch']=$request->bank_branch;
        $customer['city']=$request->city;
        $data = DB::table('customers')->insert($customer);

        
        Session()->flash('success', 'Customer Inserted Successfully!.');
        return redirect()->back();
     
        
    }

    public function all(){
        $customer = Customer::latest()->get();
        return view('customer.all-customer',compact('customer'));
    }

    public function Delete($customer_id){
        $image=Customer::findOrFail($customer_id);
        $image_one = $image->photo;
        unlink($image_one);

        Customer::findOrFail($customer_id)->delete();

        Session()->flash('warning', 'Customer Deleted Successfully!.');
        return redirect()->back();
    }


    public function View($id){
        $customer = Customer::find($id);
        return view('customer.view-customer',compact('customer'));
    }

    public function Edit($id){
        $customer = Customer::find($id);
        return view('customer.customer-edit',compact('customer'));
    }

    public  function  Update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'sometimes|nullable',
            'address' => 'required|string|max:255',
            'shopname' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'account_holder'=>'sometimes|nullable|string',
            'account_number'=>'sometimes|nullable|numeric',
            'bank_name'=>'sometimes|nullable|string',
            'bank_branch'=>'sometimes|nullable|string',
            'city'=>'required|string|max:255',
        ]);
        $customer=Customer::findOrFail($id);
        $photo='admin/images/customers/'.$customer->photo;

        if ($request->has('photo')){
            if(file_exists(public_path($photo))){
                unlink($photo);
            }
            $photo=$request->file('photo');
            $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,600)->save('admin/images/customers/'.$name_gen);
            $img_url='admin/images/customers/'.$name_gen;


        }


        $customer['name']  = $request -> name;
        $customer['email'] = $request->email;
        $customer['phone'] = $request->phone;
        $customer['address'] = $request->address;
        $customer['shopname']=$request->shopname;
        $customer['account_holder']=$request->account_holder;
        $customer['account_number']=$request->account_number;
        $customer['bank_name']=$request->bank_name;
        $customer['bank_branch']=$request->bank_branch;
        $customer['city']=$request->city;
        if ($request->has('photo')){
            $customer->photo=$img_url;
        }
        
        $customer->update();
        
        
        Session()->flash('success', 'Customer Updated Successfully!.');
        return redirect()->route('all-customer');



    }
}
