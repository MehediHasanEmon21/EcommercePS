<?php

namespace App\Http\Controllers;

use App\Model\Shipping;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mail;
use Cart;

class CheckoutController extends Controller
{
    public function customer_login(){

    	return view('frontend.customer_login');

    }

     public function customer_signup(){

    	return view('frontend.customer_signup');

    }

    public function customer_store(Request $request){
    	$token = Str::random(20);
    	DB::transaction(function() use($request,$token){

    		$this->validate($request,[
    			'email' => 'unique:users',
    			'mobile' => 'unique:users',
    		]);
    		$code = rand(0000,9999);
    		$user = new User();
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->mobile = $request->mobile;
    		$user->userType = 'customer';
    		$user->password = bcrypt($request->password);
    		$user->code = $code;
    		$user->status = 0;
    		$user->remember_token = $token;
    		$user->save();

    		$data = [
    			'email' => $request->email,
    			'code' => $code,
    		];

    		Mail::send('frontend.email.verify_email',$data, function($message) use($data){

    			$message->from('support@gmail.com','Furniture Store');
    			$message->to($data['email']);
    			$message->subject('Please verify your email address');

    		});

    	});

    	return redirect()->route('verify.email',['token' => $token ])->with('success', 'Please Check your to verify your account');

    }

    public function verify_email_form($token){

    	$user = User::where('remember_token',$token)->first();
    	return view('frontend.verify_email',compact('user'));

    }

    public function verify_email_check(Request $request){

    	$checkData = User::where('email',$request->email)->where('code',$request->code)->first();
    	if ($checkData) {
    		$checkData->status = 1;
    		$checkData->save();
    		return redirect()->route('customer.login')->with('success','Email verifird, Please login here');
    	}else{
    		return back()->with('error','Email or Password does not match');
    	}

    }

    public function checkout(){

        return view('frontend.checkout');

    }

    public function checkoutStore(Request $request){

        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->user_id = Auth::id();
        $shipping->email = $request->email;
        $shipping->mobile = $request->mobile;
        $shipping->address = $request->address;

        $shipping->save();
        Session::put('shipping_id', $shipping->id);

        return redirect()->route('customer.payment')->with('success','Shipping Info Save Successfully');

    }

    public function payment(){
        $contents = Cart::content();
        return view('frontend.payment',compact('contents'));

    }
}
