<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index(){

    	$brands = Brand::orderBy('id','DESC')->get();
    	return view('pages.brand.list',compact('brands'));

    }

    public function create(){
    	
    	return view('pages.brand.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:brands'
        ]);
    	$brand = new Brand();
    	$brand->name = $request->name;
        $brand->slug = str_slug($request->name);
    	$brand->created_by = Auth::id();
    	$brand->updated_by = Auth::id();
    	$brand->save();
    	return redirect()->route('brand.view')->with('success','Brand Added Successfully');
 


    }

      public function edit($id){

        $brand = Brand::find($id);
        return view('pages.brand.edit',compact('brand'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:brands'
        ]);

        $brand = brand::find($id);
        $brand->name = $request->name;
        $brand->slug = str_slug($request->name);
        $brand->created_by = Auth::id();
        $brand->updated_by = Auth::id();
        $brand->save();
        return redirect()->route('brand.view')->with('success','Brand Updated Successfully');

    }

    public function delete($id){
        $brand = brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success','Brand Deleted Successfully');
    }
}
