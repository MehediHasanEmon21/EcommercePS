<?php

namespace App\Http\Controllers;

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
    public function orderStore(Request $request){


    	

    	if ($request->payment_method == 'bkash' && $request->transaction_id == NULL) {
    		return redirect()->back()->with('message','Please Provide bkash transaction no !!');
    	}

    	if (Cart::count() == 0) {
    		return redirect()->back()->with('message','Please Add Cart Product First !!');
    	}else{

    		    DB::transaction(function() use ($request){

    		    $payment = new Payment();
		    	$payment->payment_method = $request->payment_method;
		    	$payment->transaction_id = $request->transaction_id;
		    	$payment->save();

		    	$order = new Order();
		    	$order->shipping_id = Session::get('shipping_id');
		    	$order->user_id = Auth::id();
		    	$order->payment_id = $payment->id;

		    	$order_data = Order::orderBy('id','DESC')->first();
		        if ($order_data == null) {
		            $firstRegis = 0;
		            $data['order_no'] = $firstRegis + 1;
		        }else{
		            $order_no = Order::orderBy('id','DESC')->first()->order_no;
		            $data['order_no'] = $order_no + 1;
		        }

		        $order->order_no = $data['order_no'];
		        $order->order_total = $request->total;
		        $order->status = 0;

		        $order->save();

		        $contents = Cart::content();

		        foreach ($contents as $content) {
		        	
		        	$order_detail = new OrderDetail();
		        	$order_detail->order_id = $order->id;
		        	$order_detail->product_id = $content->id;
		        	$order_detail->color_id = $content->options->color_id;
		        	$order_detail->size_id = $content->options->size_id;
		        	$order_detail->quantity = $content->qty;
		        	$order_detail->save();
		        }

    		});

    	}



    	Cart::destroy();

    	return redirect()->route('customer.order.list')->with('success','Order Done Successfully');

    }

    public function orderList(){
    	$data['orders'] = Order::with('payment')->where('user_id',Auth::id())->get();
    	return view('frontend.order_list',$data);
    }

    public function orderDetail($id){

    	$data['order'] = Order::with(['order_details'])->where('user_id',Auth::id())->where('id',$id)->first();
    	if ($data['order'] == NULL) {
    		return bacK()->with('error','do not try to be over smart');
    	}else{
    		return view('frontend.order_detail',$data);
    	}
    	

    }

    public function orderPrint($id){

    	$data['order'] = Order::with(['order_details'])->where('user_id',Auth::id())->where('id',$id)->first();
    	return view('frontend.order_print',$data);
    }

 
}
