<?php

namespace App\Http\Controllers;

use App\Category;
use App\Model\Brand;
use App\Model\Product;
use Illuminate\Http\Request;
use DB;
class HomePageController extends Controller
{
     public function index(){
     	$data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
     	$data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
     	$data['products'] = Product::orderBY('id','DESC')->paginate(8);
        return view('frontend.home',$data);
     }

     public function products(){
     	$data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
     	$data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
     	$data['products'] = Product::orderBY('id','DESC')->paginate(8);
     	return view('frontend.products',$data);
     }

     public function category_products($slug){
     	$category_id = Category::where('slug',$slug)->first()->id;
     	$data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
     	$data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
     	$data['products'] = Product::where('category_id',$category_id)->orderBY('id','DESC')->get();
     	return view('frontend.category_products',$data);
     }

      public function brand_products($slug){
     	$brand_id = Brand::where('slug',$slug)->first()->id;
     	$data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
     	$data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
     	$data['products'] = Product::where('brand_id',$brand_id)->orderBY('id','DESC')->get();
     	return view('frontend.brand_products',$data);
     }

     public function product_details($slug){
          $product = Product::with(['sub_images','category','brand','colors','sizes'])->where('slug',$slug)->first();
          return view('frontend.product',compact('product'));

     }

     public function findProduct(Request $request){

          $product = Product::with(['sub_images','category','brand','colors','sizes'])->where('slug',$request->slug)->first();
          return view('frontend.find_product',compact('product'));

     }

     public function getProduct(Request $request){

          $slug = $request->slug;
          $productData = DB::table('products')->where('slug','LIKE','%'.$slug.'%')->get();
          $html = '';
          $html .= '<div><ul class="list-group">';
          if ($productData) {
              foreach ($productData as $key => $v) {
                   $html .= '<li class="list-group-item">'.$v->slug.'</li>';
              }
          }
          $html .= '</ul></div>';
          return response()->json($html);

     }

     public function about(){

        return view('frontend.about');

     }

     public function contact(){

        return view('frontend.contact');

     }
}
