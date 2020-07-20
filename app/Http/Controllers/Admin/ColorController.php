<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function index(){

    	$colors = Color::orderBy('id','DESC')->get();
    	return view('pages.color.list',compact('colors'));

    }

    public function create(){
    	
    	return view('pages.color.create');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'name' => 'required|unique:colors'
        ]);
    	$color = new Color();
    	$color->name = $request->name;
    	$color->created_by = Auth::id();
    	$color->updated_by = Auth::id();
    	$color->save();
    	return redirect()->route('color.view')->with('success','Color Added Successfully');
 


    }

      public function edit($id){

        $color = Color::find($id);
        return view('pages.color.edit',compact('color'));

    }

    public function update(Request $request, $id){

    	$this->validate($request,[
            'name' => 'unique:colors'
        ]);

        $color = Color::find($id);
        $color->name = $request->name;
        $color->created_by = Auth::id();
        $color->updated_by = Auth::id();
        $color->save();
        return redirect()->route('color.view')->with('success','Color Updated Successfully');

    }

    public function delete($id){
        $color = Color::find($id);
        $color->delete();
        return redirect()->back()->with('success','Color Deleted Successfully');
    }
}
