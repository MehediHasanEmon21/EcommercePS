<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use App\Model\Size;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){

    	$products = Product::orderBy('id','DESC')->get();
    	return view('pages.product.list',compact('products'));

    }

    public function create(){
    	
    	$categories = Category::get();
    	$brands = Brand::get();
    	$colors = Color::get();
    	$sizes = Size::get();
    	return view('pages.product.create',compact('categories','brands','colors','sizes'));
    }

    public function store(Request $request){

    	DB::transaction(function() use($request){

    		$this->validate($request,[
            'name' => 'required|unique:products',
            'color_id' => 'required',
            'size_id' => 'required',
           ]);

    	  $product = new Product();

    	  $image = $request->file('image');

	      if ($image) {

	    		$unique_str = Str::random(10);
	            $ext=strtolower($image->getClientOriginalExtension());
	            $image_name = $unique_str.'.'.$ext;
	            $upload_path = 'public/assets/backend/images/product/';
	            $image_url = $upload_path.$image_name;
	            $image->move($upload_path,$image_name);
	    		$product->image = $image_url;

	       }else{
	    		$product->image = 'default.png';
	    	}

	       $product->name = $request->name;
	       $product->category_id = $request->category_id;
	       $product->brand_id = $request->brand_id;
	       $product->short_desc = $request->short_desc;
	       $product->long_desc = $request->long_desc;
	       $product->price = $request->price;
	       $product->slug = str_slug($request->name);

	       if ($product->save()) {

	       		$files = $request->sub_image;
	       		if (!empty($files)) {
	       			foreach ($files as $file) {
	       				$unique_str = Str::random(10);
			            $ext=strtolower($file->getClientOriginalExtension());
			            $image_name = $unique_str.'.'.$ext;
			            $upload_path = 'public/assets/backend/images/product/product_subimage/';
			            $image_url = $upload_path.$image_name;
			            $file->move($upload_path,$image_name);

			            $sub_image = new ProductSubImage(); 
			    		$sub_image->sub_image = $image_url;
			    		$sub_image->product_id = $product->id;
			    		$sub_image->save();
	       			}
	       		}

	       		$colors = $request->color_id;
	       		if (!empty($colors)) {
	       			foreach ($colors as  $color) {
	       				$product_color = new ProductColor();
	       				$product_color->product_id = $product->id;
	       				$product_color->color_id = $color;
	       				$product_color->save();
	       			}
	       			
	       		}

	       		$sizes = $request->size_id;
	       		if (!empty($sizes)) {
	       			foreach ($sizes as  $size) {
	       				$product_size = new ProductSize();
	       				$product_size->product_id = $product->id;
	       				$product_size->size_id = $size;
	       				$product_size->save();
	       			}
	       			
	       		}
	   
	       }else{
	       	return back()->with('error','Something Went Wrong');
	       }



    	});

    	

    	return redirect()->route('product.view')->with('success','Product Added Successfully');

    }

      public function edit($id){

        $product = Product::find($id);
        $categories = Category::get();
    	$brands = Brand::get();
    	$colors = Color::get();
    	$sizes = Size::get();
    	$product_colors = ProductColor::select('color_id')->where('product_id',$product->id)->get()->toArray();
    	$product_sizes = ProductSize::select('size_id')->where('product_id',$product->id)->get()->toArray();
        return view('pages.product.edit',compact('product','categories','brands','colors','sizes','product_colors','product_sizes'));

    }

    public function update(Request $request, $id){

    	DB::transaction(function() use($request,$id){

    		$this->validate($request,[
            'name' => 'required|unique:products',
            'color_id' => 'required',
            'size_id' => 'required',
           ]);

    	  $product = Product::find($id);

    	  $image = $request->file('image');

	      if ($image) {


	      		$product_info = DB::table('products')->where('id',$id)->first();
	    		$old_pic = $product_info->image;
	    		if (file_exists($old_pic)) {
	    			unlink($old_pic);
	    		}

	    		$unique_str = Str::random(10);
	            $ext=strtolower($image->getClientOriginalExtension());
	            $image_name = $unique_str.'.'.$ext;
	            $upload_path = 'public/assets/backend/images/product/';
	            $image_url = $upload_path.$image_name;
	            $image->move($upload_path,$image_name);
	    		$product->image = $image_url;

	       }else{
	    		$product->image = $product->image;
	    	}

	       $product->name = $request->name;
	       $product->category_id = $request->category_id;
	       $product->brand_id = $request->brand_id;
	       $product->short_desc = $request->short_desc;
	       $product->long_desc = $request->long_desc;
	       $product->price = $request->price;
	       $product->slug = str_slug($request->name);

	       if ($product->save()) {

	       		$files = $request->sub_image;

	       		if (!empty($files)) {
	       			
	       			$ProductSubImages = ProductSubImage::where('product_id',$id)->get();

	       			foreach ($ProductSubImages as $key => $subImage) {
	       				$old_sub_pic = $subImage->sub_image;
			    		if (file_exists($old_sub_pic)) {
			    			unlink($old_sub_pic);
			    		}
	       			}

	       			ProductSubImage::where('product_id',$id)->delete();
	       		}

	       		if (!empty($files)) {
	       			foreach ($files as $file) {
	       				$unique_str = Str::random(10);
			            $ext=strtolower($file->getClientOriginalExtension());
			            $image_name = $unique_str.'.'.$ext;
			            $upload_path = 'public/assets/backend/images/product/product_subimage/';
			            $image_url = $upload_path.$image_name;
			            $file->move($upload_path,$image_name);

			            $sub_image = new ProductSubImage(); 
			    		$sub_image->sub_image = $image_url;
			    		$sub_image->product_id = $product->id;
			    		$sub_image->save();
	       			}
	       		}

	       		$colors = $request->color_id;
	       		if (!empty($colors)) {
	       			ProductColor::where('product_id',$id)->delete();
	       		}
	       		if (!empty($colors)) {
	       			foreach ($colors as  $color) {
	       				$product_color = new ProductColor();
	       				$product_color->product_id = $product->id;
	       				$product_color->color_id = $color;
	       				$product_color->save();
	       			}
	       			
	       		}

	       		$sizes = $request->size_id;
	       		if (!empty($sizes)) {
	       			ProductSize::where('product_id',$id)->delete();
	       		}
	       		if (!empty($sizes)) {
	       			foreach ($sizes as  $size) {
	       				$product_size = new ProductSize();
	       				$product_size->product_id = $product->id;
	       				$product_size->size_id = $size;
	       				$product_size->save();
	       			}
	       			
	       		}
	   
	       }else{
	       	return back()->with('error','Something Went Wrong');
	       }



    	});
        return redirect()->route('product.view')->with('success','Product Updated Successfully');

    }

    public function delete($id){

        $product = Product::find($id);

        $old_pic = $product->image;
		if (file_exists($old_pic)) {
			unlink($old_pic);
		}
		Product::where('id',$id)->delete();

		$ProductSubImages = ProductSubImage::where('product_id',$id)->get();

		if (count($ProductSubImages) > 0) {
			foreach ($ProductSubImages as $key => $subImage) {
				$old_sub_pic = $subImage->sub_image;
				if (file_exists($old_sub_pic)) {
					unlink($old_sub_pic);
				  }
			}
			ProductSubImage::where('product_id',$id)->delete();
		}

		ProductColor::where('product_id',$id)->delete();
		ProductSize::where('product_id',$id)->delete();

		return redirect()->route('product.view')->with('success','Product Deleted Successfully');



    }

    public function details($id){

    	$product = Product::with(['category','brand'])->find($id);
    	$product_colors = ProductColor::with(['color'])->where('product_id',$id)->get();
    	$product_sizes = ProductSize::with(['size'])->where('product_id',$id)->get();
    	$product_images = ProductSubImage::where('product_id',$id)->get();
    	return view('pages.product.details',compact('product','product_colors','product_sizes','product_images'));

    }
}
