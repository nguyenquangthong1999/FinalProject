<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@nothing1');
Route::get('/home','HomeController@nothing')->name('HOME');

//BE
Route::get('loginadmin','AdminController@dangnhapAdmin')->name('LOGIN_ADMIN');
Route::get('admin_dashboard','AdminController@show_dashboard1')->name('DASHBOARD');// Showdashboard1:Cái ni là nhấn vô dòng chữ Dashboard sau khi login vào được
Route::post('dashboard','AdminController@show_dashboard2');
// Showdashboard2: Cái ni là lúc đăng nhập


//Reset password
Route::get('form','AdminController@getFormReset')->name('getFormReset');
Route::post('form','AdminController@sendCodeResetPW');

Route::get('directGmail','AdminController@directGmail')->name('get.link.resetpw'); 
Route::post('directGmail','AdminController@inputResetPW');
// Nhập gmail để lấy FORM từ GMAIL

// CategoryProduct
//create category
Route::get('add_category','Category@showHandleForm1')->name('ADD_CATE');
Route::post('add-category','Category@createHandleForm1');
Route::get('all_category','Category@index')->name('ALL_CATE');
Route::get('delete-category/{category_id}','Category@destroyHandleForm4');

//Update
// Route::get('update_category_product/{category_id}','ProductTest@edit');
// Route::post('update-category-product/{category_id}','ProductTest@update')->name('updateCategoryProduct');

Route::resource('category-product', 'Category')->only('edit', 'update');
// -> Route::resource('products', 'ProductTest');
// route('products.index') -> tự map với ProductTest@index

//Brand
//Add brand
Route::get('add_brand','BrandController@show')->name('ADD_BRAND');
Route::post('add-brand','BrandController@create');

Route::get('all_brand','BrandController@index')->name('ALL_BRAND');

Route::get('delete-brand/{brand_id}','BrandController@destroy');

Route::resource('brand', 'BrandController')->only('edit', 'update');


// Product
//Add Product
Route::get('add_product','ProductController@add_product')->name('ADD_PRODUCT');//getform
Route::post('add-product','ProductController@addproduct');//tra du lieu 

// All Product
Route::get('all_product','ProductController@all_product')->name('ALL_PRODUCT');

// Update Product
Route::get('update_product/{product_id}','ProductController@update_product')->name('UPDATE_PRODUCT');
Route::post('update-product/{product_id}','ProductController@updateproduct');

// Delete Product
Route::get('delete_product/{product_id}','ProductController@delete_product');

//Social Network Login
//Login Facebook
Route::get('loginadmin/login-facebook','SocialNetwork@login_facebook')->name('FACEBOOK');
Route::get('loginadmin/callback','SocialNetwork@callback_facebook');

//Login Google
Route::get('loginadmin/login-google','SocialNetwork@login_google')->name('GOOGLE');
Route::get('loginadmin/callback2','SocialNetwork@callback_google');

//Login Github
Route::get('loginadmin/login-github','SocialNetwork@login_github')->name('GITHUB');
Route::get('loginadmin/callback3','SocialNetwork@callback_github');

// //Login Github
// Route::get('loginadmin/login-github','SocialNetwork@login_github')->name('TWITTER');
// Route::get('loginadmin/callback3','SocialNetwork@callback_github');

// Show Category Items Interface
Route::get('category/{category_id}','HomeController@showCategoryItem');
Route::get('brand/{brand_id}','HomeController@showBrandItem');

Route::get('detailproduct/{product_id}','HomeController@showDetailProduct');

//Checkout
Route::get('login_checkout','CheckoutController@logincheckout')->name('LOGIN_CHECKOUT');
Route::post('register_customer','CheckoutController@register')->name('REGISTER_CUSTOMER');
Route::get('checkout','CheckoutController@checkout')->name('CHECKOUT');
Route::post('save-checkout-customer','CheckoutController@savecheckout');
Route::get('logout_checkout','CheckoutController@logoutcheckout')->name('LOGOUT_CHECKOUT');
Route::post('login-customer','CheckoutController@logincustomer')->name('LOGIN_CUSTOMER');
Route::get('payment','CheckoutController@payment')->name('PAYMENT');
Route::post('confirm_order','CheckoutController@confirm_order');
Route::post('select_delivery_home','CheckoutController@select_delivery_home');
Route::post('calculate_fee','CheckoutController@calculate_fee');

// Cart
Route::get('show_cart','CartController@show_cart');
Route::post('add_cart','CartController@add_cart');
Route::post('update_cart','CartController@update_cart');
Route::get('delete_cart/{session_id}','CartController@delete_cart');
Route::get('remove_cart','CartController@remove_cart');
// Route::post('add_cart','CartController@add_cart');
Route::get('show_cart_quantity','CartController@show_cart_quantity');

// Coupon
Route::get('add_coupon','CouponController@add_coupon')->name('ADD_COUPON');
Route::post('add-coupon','CouponController@add_coupon2');
Route::get('all_coupon','CouponController@all_coupon')->name('ALL_COUPON');
Route::get('delete_coupon/{coupon_id}','CouponController@delete_coupon');
Route::post('check_coupon','CartController@check_coupon');

//Delivery(Phi van chuyen)
Route::get('insert_delivery','Delivery@insert_delivery')->name('INSERT_DELIVERY');
Route::post('delivery','Delivery@delivery');
Route::post('select_delivery','Delivery@select_delivery');
Route::post('loadfeeship','Delivery@loadfeeship');
Route::post('update_delivery','Delivery@updatefeeship');

//Order
Route::get('manager_order','OrderController@manager_order')->name('MANAGER_ORDER');
Route::get('view_order/{order_code}','OrderController@view_order');
Route::get('delete_order/{order_code}','OrderController@delete_order');

//PW Customer
Route::get('/send-mail','MailController@send_mail');
Route::get('/quen-mat-khau','MailController@quen_mat_khau');
Route::get('/update-new-pass','MailController@update_new_pass');
Route::post('/recover-pass','MailController@recover_pass');
Route::post('/reset-new-pass','MailController@reset_new_pass');


Route::get('vnpay','CheckoutController@vnpay');
Route::get('sms','CheckoutController@sms');

