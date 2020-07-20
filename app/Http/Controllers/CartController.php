<?php

namespace App\Http\Controllers;

use App\Model\Color;
use App\Model\Product;
use App\Model\Size;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_cart(Request $request, $id){


		$this->validate($request,[
	        'color_id' => 'required',
	        'size_id' => 'required',
	        'quantity' => 'required',
       ]);

    	$product = Product::where('id',$id)->first();
        $product_size = Size::where('id',$request->size_id)->first();
        $product_color = Color::where('id',$request->color_id)->first();

    	Cart::add([
    		'id' => $product->id, 
    		'name' => $product->name, 
    		'qty' => $request->quantity, 
    		'price' => $product->price, 
    		'weight' => 550, 
    		'options' => [
    			'size' => $product_size->name,
                'size_id' => $request->size_id,
    			'color' => $product_color->name,
                'color_id' => $request->color_id,
    			'image' => $product->image,
    		]
    	]);

    	return redirect()->route('cart.products')->with('success','Cart Product Added Successfully ');

    }

    public function show_cart_products(){
    	$contents = Cart::content();
    	return view('frontend.cart',compact('contents'));

    }

    public function cart_update(Request $request){

    	Cart::update($request->rowId, $request->quantity);
    	return redirect()->back()->with('success','Cart Updated Succesfully');
    }

    public function cart_delete($rowId){
    	Cart::remove($rowId);
    	return redirect()->back()->with('success','Cart Remove Succesfully');
    }
}
