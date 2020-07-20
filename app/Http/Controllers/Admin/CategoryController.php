<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function all_category(){

    	$categorys = Category::orderBy('id','DESC')->get();
    	return view('pages.category.list',compact('categorys'));

    }

    public function create(){
    	return view('pages.category.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|unique:categories'
        ]);

    	$category = new Category();
    	$category->name = $request->name;
        $category->slug = str_slug($request->name);
    	$category->created_by = Auth::id();
    	$category->updated_by = Auth::id();
    	$category->save();
    	return redirect()->route('category.view')->with('success','category Added Successfully');
 


    }

      public function edit($id){

        $category = Category::find($id);
        return view('pages.category.edit',compact('category'));

    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'name' => 'unique:categories'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->created_by = Auth::id();
        $category->updated_by = Auth::id();
        $category->save();
        return redirect()->route('category.view')->with('success','Category Updated Successfully');

    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
