<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomePageController@index')->name('home.page');
Route::get('/products', 'HomePageController@products')->name('product.list');
Route::get('/products-category/{slug}', 'HomePageController@category_products')->name('category.product');
Route::get('/products-brand/{slug}', 'HomePageController@brand_products')->name('brand.product');
Route::get('/product-{slug}', 'HomePageController@product_details')->name('product.detail');
Route::post('/find-product', 'HomePageController@findProduct')->name('find.products');
Route::get('/get-product', 'HomePageController@getProduct')->name('get.product');
Route::get('/about', 'HomePageController@about')->name('about.page');
Route::get('/contact', 'HomePageController@contact')->name('contact.page');

//cart route
Route::post('/cart/add/{id}', 'CartController@add_cart')->name('cart.add');
Route::get('/cart', 'CartController@show_cart_products')->name('cart.products');
Route::post('/cart/update', 'CartController@cart_update')->name('cart.update');
Route::get('/cart/delete/{rowId}', 'CartController@cart_delete')->name('cart.delete');

//login route
Route::get('/customer-login','CheckoutController@customer_login')->name('customer.login');
Route::get('/customer-signup','CheckoutController@customer_signup')->name('customer.signup');
Route::post('/customer-signup','CheckoutController@customer_store')->name('customer.signup.store');
Route::get('/verify-email/{token}','CheckoutController@verify_email_form')->name('verify.email');
Route::post('/verify-check','CheckoutController@verify_email_check')->name('verify.check');

//customer dashboard

Route::group(['middleware' => ['auth','customer']],function(){

	Route::get('/customer-dashboard','CustomerDashboardController@index')->name('customer.dashboard');
	Route::get('/customer-edit-profile','CustomerDashboardController@editProfile')->name('customer.edit.profile');
	Route::post('/customer-update-profile','CustomerDashboardController@updateProfile')->name('customer.profile.update');
	Route::get('/customer-password-update','CustomerDashboardController@editPassword')->name('customer.password');
	Route::post('/customer-password-update','CustomerDashboardController@updatePassword')->name('customer.password.update');
	Route::get('/checkout','CheckoutController@checkout')->name('customer.checkout');
	Route::post('/checkout-store','CheckoutController@checkoutStore')->name('customer.shipping.store');
	Route::get('/payment','CheckoutController@payment')->name('customer.payment');
	Route::post('/order-store','OrderController@orderStore')->name('order.store');
	Route::get('/order-list','OrderController@orderList')->name('customer.order.list');
	Route::get('/order-details/{id}','OrderController@orderDetail')->name('customer.order.detail');
	Route::get('/order-print/{id}','OrderController@orderPrint')->name('customer.order.print');

});

Auth::routes();













Route::group(['middleware' => ['auth','admin']],function(){


	Route::get('/dashboard', 'HomeController@index')->name('home');
	Route::prefix('/user')->group(function(){

		Route::get('/list','Admin\UserController@all_user')->name('user.view');
		Route::get('/create','Admin\UserController@create')->name('user.create');
		Route::post('/store','Admin\UserController@store')->name('user.store');
		Route::get('/delete/{id}','Admin\UserController@delete')->name('user.destroy');

	});

	Route::prefix('/profile')->group(function(){

		Route::get('/view','Admin\ProfileController@view')->name('profile.view');
		Route::get('/edit/{id}','Admin\ProfileController@edit')->name('profile.edit');
		Route::post('/update/{id}','Admin\ProfileController@update')->name('profile.update');


	});

	

	
	

	//category route
	Route::prefix('/category')->group(function(){

		Route::get('/list','Admin\CategoryController@all_category')->name('category.view');
		Route::get('/create','Admin\CategoryController@create')->name('category.create');
		Route::post('/store','Admin\CategoryController@store')->name('category.store');
		Route::get('/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
		Route::post('/update/{id}','Admin\CategoryController@update')->name('category.update');
		Route::get('/delete/{id}','Admin\CategoryController@delete')->name('category.delete');


	});

	//brand route
	Route::prefix('/brand')->group(function(){

		Route::get('/list','Admin\BrandController@index')->name('brand.view');
		Route::get('/create','Admin\BrandController@create')->name('brand.create');
		Route::post('/store','Admin\BrandController@store')->name('brand.store');
		Route::get('/edit/{id}','Admin\BrandController@edit')->name('brand.edit');
		Route::post('/update/{id}','Admin\BrandController@update')->name('brand.update');
		Route::get('/delete/{id}','Admin\BrandController@delete')->name('brand.delete');


	});

	//color route
	Route::prefix('/color')->group(function(){

		Route::get('/list','Admin\ColorController@index')->name('color.view');
		Route::get('/create','Admin\ColorController@create')->name('color.create');
		Route::post('/store','Admin\ColorController@store')->name('color.store');
		Route::get('/edit/{id}','Admin\ColorController@edit')->name('color.edit');
		Route::post('/update/{id}','Admin\ColorController@update')->name('color.update');
		Route::get('/delete/{id}','Admin\ColorController@delete')->name('color.delete');


	});

	//size route
	Route::prefix('/size')->group(function(){

		Route::get('/list','Admin\SizeController@index')->name('size.view');
		Route::get('/create','Admin\SizeController@create')->name('size.create');
		Route::post('/store','Admin\SizeController@store')->name('size.store');
		Route::get('/edit/{id}','Admin\SizeController@edit')->name('size.edit');
		Route::post('/update/{id}','Admin\SizeController@update')->name('size.update');
		Route::get('/delete/{id}','Admin\SizeController@delete')->name('size.delete');


	});

	//size route
	Route::prefix('/product')->group(function(){

		Route::get('/list','Admin\ProductController@index')->name('product.view');
		Route::get('/create','Admin\ProductController@create')->name('product.create');
		Route::post('/store','Admin\ProductController@store')->name('product.store');
		Route::get('/edit/{id}','Admin\ProductController@edit')->name('product.edit');
		Route::post('/update/{id}','Admin\ProductController@update')->name('product.update');
		Route::get('/delete/{id}','Admin\ProductController@delete')->name('product.delete');
		Route::get('/detail/{id}','Admin\ProductController@details')->name('product.details');


	});

		//size route
	Route::prefix('/order')->group(function(){

		Route::get('/pending/list','Admin\OrderController@pending_order_list')->name('order.pending.list');
		Route::get('/approve/list','Admin\OrderController@approve_order_list')->name('order.approve.list');
		Route::get('/detail/{id}','Admin\OrderController@detail')->name('order.detail');
		Route::get('/approve/{id}','Admin\OrderController@approve')->name('order.approve');


	});

	Route::prefix('/customer')->group(function(){

		Route::get('/list','Admin\CustomerController@index')->name('customer.list');
		Route::get('/draft/list','Admin\CustomerController@draft')->name('customer.draft.list');
		Route::get('/delete/{id}','Admin\CustomerController@delete')->name('customer.delete');


	});

	
	

	


	

	


});


