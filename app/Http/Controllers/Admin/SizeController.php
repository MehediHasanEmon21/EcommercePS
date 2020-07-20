<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    public function index(){

    	$sizes = Size::orderBy('id','DESC')->get();
    	return view('pages.size.list',compact('sizes'));

    }

    public function create(){
    	
    	return view('pages.size.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:sizes'
        ]);
    	$size = new Size();
    	$size->name = $request->name;
    	$size->created_by = Auth::id();
    	$size->updated_by = Auth::id();
    	$size->save();
    	return redirect()->route('size.view')->with('success','Size Added Successfully');
 


    }

      public function edit($id){

        $size = size::find($id);
        return view('pages.size.edit',compact('size'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:sizes'
        ]);

        $size = Size::find($id);
        $size->name = $request->name;
        $size->created_by = Auth::id();
        $size->updated_by = Auth::id();
        $size->save();
        return redirect()->route('size.view')->with('success','Size Updated Successfully');

    }

    public function delete($id){
        $size = Size::find($id);
        $size->delete();
        return redirect()->back()->with('success','Size Deleted Successfully');
    }
}
