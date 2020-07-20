<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerDashboardController extends Controller
{
    public function index(){
    	return view('frontend.customer_dashboard');
    }

    public function editProfile(){

    	$user = User::where('id',Auth::id())->first();
    	return view('frontend.customer_edit_profile',compact('user'));

    }

    public function updateProfile(Request $request){

    	$user =  User::find(Auth::id());
    	$image = $request->file('image');

    	if ($image) {
    		
    		$user_info = DB::table('users')->where('id',Auth::id())->first();
    		$old_pic = $user_info->image;
    		if (file_exists($old_pic)) {
    			unlink($old_pic);
    		}
    		$unique_str = Str::random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_name = $unique_str.'.'.$ext;
            $upload_path = 'public/assets/frontend/images/customer/';
            $image_url = $upload_path.$image_name;
            $image->move($upload_path,$image_name);
    		$user->image = $image_url;

    	}

    	
    	$user->name = $request->name;
    	$user->email  = $request->email ;
    	$user->mobile = $request->mobile;
    	$user->gender = $request->gender;
    	$user->address = $request->address;

    	$user->save();

    	return redirect()->route('customer.dashboard')->with('success','Profile Updated Successfully');

    }

    public function editPassword(){

    	return view('frontend.customer_edit_password');

    }

    public function updatePassword(Request $request){


        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            
            $user =  User::where('id',Auth::id())->first();
            $user->password = bcrypt($request->new_password);
            return redirect()->route('customer.dashboard')->with('success','Password Updated Successfully');

        }else{
            return back()->with('error','Sorry, your current password donot match !!');
        }

    }
}
