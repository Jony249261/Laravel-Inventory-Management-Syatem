<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(Request $request){
        
        $data = array();
        $data['id'] = $request->id;
        $data['name'] = $request->name;
        $data['qty'] = $request->qty;
        $data['price'] = $request->price;

        Cart::add($data);

        Session::flash('success','Product added to Cart Successfully!');
        return redirect()->back();
    }

    public function Update(Request $request, $id){
        $qty = $request->qty;
        Cart::update($id, $qty);
        Session::flash('success','Cart Updated Successfully!');
        return redirect()->back();
    }

    public function Delete($id){
        Cart::remove($id);
        Session::flash('success','Cart Remove Successfully!');
        return redirect()->back();
    }

    public function Invoice(Request $request){

        $request->validate([
            'cus_name' => 'required',
        ],
        [
            'cus_name.required' => 'Select A customer',
        ]
    );
       $contents=Cart::content();
        $cus_id = $request->cus_name;
        $customer = DB::table('customers')->where('id', $cus_id)->first();
        return view('invoice', compact('contents', 'customer'));

    }


    public function FinalInvoice(Request $request){
        $request->validate([
            'payment_status' => 'required',
        ],
        [
            'payment_status.required' => 'Select A Payment method',
        ]
     );

     $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['sub_total'] = $request->sub_total;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        $data['payment_status'] = $request->payment_status;

        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::content();
        $odata = array();
        
        foreach($contents as $content){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity'] = $content->qty;
            $odata['unitcost'] = $content->price;
            $odata['total'] = $content->total;

            $insert = DB::table('ordersdetails')->insert($odata);
            

        }
        if($insert){
            Session::flash('success','Invoice Created Successfully! | Please Delivery The Product and Accept Status');
            Cart::destroy();
        return redirect()->route('home');
        }else{
            Session::flash('success','Invoice Not Created Successfully!');
        return redirect()->back();
        }

    }
}
