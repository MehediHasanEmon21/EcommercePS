<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

    	$data['customers'] = User::where('userType','customer')->where('status',1)->orderBy('id','DESC')->get();

    	return view('pages.customer.list',$data);

    }

    public function draft(){

    	$data['customers'] = User::where('userType','customer')->where('status',0)->orderBy('id','DESC')->get();

    	return view('pages.customer.draft_list',$data);

    }

    public function delete($id){

    	$user_info = DB::table('users')->where('id',$id)->first();
    	$old_pic = $user_info->image;
    	if (file_exists($old_pic)) {
    	unlink($old_pic);
        }
    	$user =  User::find($id);
    	$user->delete();

    	return redirect()->back()->with('success','Data Deleted Successfully');
    		

    }
}
