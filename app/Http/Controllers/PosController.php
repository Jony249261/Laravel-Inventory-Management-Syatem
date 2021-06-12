<?php

namespace App\Http\Controllers;
use Image;
use DB;
use App\Category;
use App\Ordersdetails;
use App\Order;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $product = DB::table('products')
                ->join('categories', 'products.cat_id','categories.id')
                ->select('categories.cat_name','products.*')
                ->get();
        $customer = DB::table('customers')->get();
        $category = DB::table('categories')->get();
        return view('pos.pos',compact('product', 'customer', 'category'));
    }


    //Pending Orders

    public function PendingOrders(){
        $pending = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')
        ->where('order_status', 'pending')->get();

        return view('pendingorders', compact('pending'));
    }


    public function ViewOrders($id){
        $order=Order::findOrFail($id);
      return view('order_confirmation',compact('order'));

        
    }

    public function PosoDone($id){
        $approve = Order::findOrFail($id);

        $approve['order_status']  = "Success";
        
        
        $approve->update();


        Session()->flash('success', 'Order Confirmed Successfully! And All Products Delivered Successfully!.');
        return redirect()->route('pending.orders');
    }


    public function SuccessOrders(){
        $success = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->select('customers.name', 'orders.*')
        ->where('order_status', 'success')->get();

        return view('success_orders', compact('success'));
    }

}
