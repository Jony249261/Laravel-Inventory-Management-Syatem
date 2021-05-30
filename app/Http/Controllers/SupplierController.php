<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Image;
use DB;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('supplier.add-supplier');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'sometimes|nullable|email|unique:suppliers',
            'address' => 'required|string|max:255',
            'shopname' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'account_holder'=>'sometimes|nullable|string',
            'account_number'=>'sometimes|nullable|numeric',
            'bank_name'=>'sometimes|nullable|string',
            'bank_branch'=>'sometimes|nullable|string',
            'city'=>'required|string|max:255',
            'city'=>'required|string|max:255',
        ]);

        
       $img_url = null;
       if($request->has('photo')){
           $photo=$request->file('photo');
           $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
           Image::make($photo)->save('admin/images/supplier/'.$name_gen);
           $img_url='admin/images/supplier/'.$name_gen;
       }


        
//        
        $supplier=array();
        $supplier['name']  = $request -> name;
        $supplier['email'] = $request->email;
        $supplier['phone'] = $request->phone;
        $supplier['address'] = $request->address;
        $supplier['photo']=$img_url;
        $supplier['shop']=$request->shop;
        $supplier['accountholder']=$request->accountholder;
        $supplier['accountnumber']=$request->accountnumber;
        $supplier['bankname']=$request->bankname;
        $supplier['bankbranch']=$request->bankbranch;
        $supplier['city']=$request->city;
        $supplier['type']=$request->type;
        $data = DB::table('suppliers')->insert($supplier);

        
        Session::flash('success','Supplier Inserted Successfully!');
        return redirect()->route('all-supplier');
     
        
    }


    public function all(){
        $supplier = Supplier::latest()->get();
        return view('supplier.all-supplier',compact('supplier'));
    }

    public function Delete($supplier_id){
        $image=Supplier::findOrFail($supplier_id);
        $image_one = $image->photo;
        unlink($image_one);

        Supplier::findOrFail($supplier_id)->delete();

        
        Session::flash('warning','Supplier Deleted Successfully');
        return redirect()->back();
    }

    public function View($id){
        $supplier = Supplier::find($id);
        return view('supplier.view-supplier',compact('supplier'));
    }

    public function Edit($id){
        $supplier = Supplier::find($id);
        return view('supplier.supplier-edit',compact('supplier'));
    }


    public  function  Update(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'sometimes|nullable',
            'address' => 'required|string|max:255',
            'shop' => 'sometimes|nullable|string',
            'photo' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'account_holder'=>'sometimes|nullable|string',
            'account_number'=>'sometimes|nullable|numeric',
            'bank_name'=>'sometimes|nullable|string',
            'bank_branch'=>'sometimes|nullable|string',
            'city'=>'required|string|max:255',
        ]);
        $supplier=Supplier::findOrFail($id);
        $photo='admin/images/supplier/'.$supplier->photo;

        if ($request->has('photo')){
            if(file_exists(public_path($photo))){
                unlink($photo);
            }
            $photo=$request->file('photo');
            $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,600)->save('admin/images/supplier/'.$name_gen);
            $img_url='admin/images/supplier/'.$name_gen;


        }


        $supplier['name']  = $request -> name;
        $supplier['email'] = $request->email;
        $supplier['phone'] = $request->phone;
        $supplier['address'] = $request->address;
        $supplier['shop']=$request->shop;
        $supplier['accountholder']=$request->accountholder;
        $supplier['accountnumber']=$request->accountnumber;
        $supplier['bankname']=$request->bankname;
        $supplier['bankbranch']=$request->bankbranch;
        $supplier['city']=$request->city;
        $supplier['type']=$request->type;
        if ($request->has('photo')){
            $supplier->photo=$img_url;
        }
        
        $supplier->update();
        
        
        Session::flash('success','Supplier updated successfully!!');
        return redirect()->route('all-supplier');



    }
}
