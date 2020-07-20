<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){

    	return $this->belongsTo('App\Category','category_id','id');
    }

    public function brand(){

    	return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function sub_images(){
    	return $this->hasMany('App\Model\ProductSubImage','product_id','id');
    }

    public function colors(){
    	return $this->hasMany('App\Model\ProductColor','product_id','id');
    }

    public function sizes(){
    	return $this->hasMany('App\Model\ProductSize','product_id','id');
    }
}
