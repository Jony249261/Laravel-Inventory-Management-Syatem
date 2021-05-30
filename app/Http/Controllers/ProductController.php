<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Image;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('product.add-product');
    }

    public function all(){
        $product = Product::latest()->get();
        return view('product.all-product',compact('product'));
    }

    public function store(Request $request){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_code' => 'required|numeric',
            'product_garage' => 'required|string|max:10',
            'product_route' => 'required|numeric',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'product_image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        
       $img_url = null;
       if($request->has('product_image')){
           $product_image=$request->file('product_image');
           $name_gen=hexdec(uniqid()).'.'.$product_image->getClientOriginalExtension();
           Image::make($product_image)->save('admin/images/products/'.$name_gen);
           $img_url='admin/images/products/'.$name_gen;
       }
    
        $product=array();
        $product['product_name']  = $request -> product_name;
        $product['cat_id'] = $request->cat_id;
        $product['sup_id'] = $request->sup_id;
        $product['product_code'] = $request->product_code;
        $product['product_image']=$img_url;
        $product['product_garage']=$request->product_garage;
        $product['product_route']=$request->product_route;
        $product['buy_date']=$request->buy_date;
        $product['expire_date']=$request->expire_date;
        $product['selling_price']=$request->selling_price;
        $product['buying_price']=$request->buying_price;
        $data = DB::table('products')->insert($product);

        
        Session::flash('success','Product Inserted Successfully!');
        return redirect()->route('all-product');
     
        
    }

    

    public function Delete($product_id){
        $image=Product::findOrFail($product_id);
        $image_one = $image->product_image;
        unlink($image_one);

        Product::findOrFail($product_id)->delete();

        Session()->flash('warning', 'Product Deleted Successfully!.');
        return redirect()->back();
    }


    public function View($id){
        $product = DB::table('products')
                  ->join('categories', 'products.cat_id','categories.id')
                  ->join('suppliers', 'products.sup_id','suppliers.id')
                  ->select('categories.cat_name','products.*', 'suppliers.name')
                  ->where('products.id',$id)
                  ->first();
        return view('product.view-product', compact('product'));
    }

    public function Edit($id){
        $product = Product::find($id);
        return view('product.product-edit',compact('product'));
    }

    public  function  Update(Request $request,$id){
        $request->validate([
            'product_name' => 'required|string|max:255',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'product_code' => 'required|numeric',
            'product_garage' => 'required|string|max:10',
            'product_route' => 'required|numeric',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'product_image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $product=Product::findOrFail($id);
        $product_image='admin/images/products/'.$product->product_image;

        if ($request->has('product_image')){
            if(file_exists(public_path($product_image))){
                unlink($product_image);
            }
            $product_image=$request->file('product_image');
            $name_gen=hexdec(uniqid()).'.'.$product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(600,600)->save('admin/images/products/'.$name_gen);
            $img_url='admin/images/products/'.$name_gen;


        }

        $product['product_name']  = $request -> product_name;
        $product['cat_id'] = $request->cat_id;
        $product['sup_id'] = $request->sup_id;
        $product['product_code'] = $request->product_code;
        $product['product_garage']=$request->product_garage;
        $product['product_route']=$request->product_route;
        $product['buy_date']=$request->buy_date;
        $product['expire_date']=$request->expire_date;
        $product['selling_price']=$request->selling_price;
        $product['buying_price']=$request->buying_price;
        if ($request->has('product_image')){
            $product->product_image=$img_url;
        }
        
        $product->update();
        
        
        Session::flash('success','Product updated successfully!!');
        return redirect()->route('all-product');



    }
}
