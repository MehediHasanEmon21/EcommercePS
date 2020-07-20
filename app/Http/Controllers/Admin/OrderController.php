<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class OrderController extends Controller
{
    public function pending_order_list(){

    	$data['orders'] = Order::with('payment')->where('status',0)->get();
    	return view('pages.order.pending_order',$data);

    }

     public function approve_order_list(){

    	$data['orders'] = Order::with('payment')->where('status',1)->get();
    	return view('pages.order.approve_order',$data);

    }

    public function detail($id){
    	$data['order'] = Order::with(['order_details'])->where('id',$id)->first();
    	return view('pages.order.detail',$data);
    }

    public function approve($id){

        $order = Order::where('id',$id)->first();
        $order->status = 1;
        $order->save();

        return redirect()->route('order.approve.list')->with('success','Order Approved Successfully');

    }
}
