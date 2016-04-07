<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//ADE
Route::get('/', 'HomeController@index');
Route::get('produk/{slug}','ProductController@product');
Route::get('produk/{slug}/{subcategory}','ProductController@subproduct');
Route::get('produk/{slug}/{subcategory}/{id}','ProductController@detail');
Route::get('detail/{id}','ProductController@detail_cart');
Route::get('login_form','UserController@login_form');
Route::get('login','UserController@login');
Route::get('logout','UserController@logout');
Route::get('daftar','UserController@register_form');
Route::get('register','UserController@register');
Route::get('dashboard','UserCOntroller@dashboard');
Route::get('update','UserController@update');
Route::get('form_ubah_pass','UserController@change_pass_form');
Route::get('ubah_pass','UserController@change_pass');
Route::get('cek_order_form','OrderController@check_order_form');
Route::post('upload_photopic', 'UserController@upload');
Route::get('tambah_rek','UserController@add_bank_acc');
Route::get('hapus_rek/{no_rek}','UserController@delete_bank_acc');
Route::post('save_photo','ProductController@save_photo');
Route::post('order','OrderController@order');
Route::get('delete_order/{row_id}','OrderController@delete_order');
Route::get('update_order','OrderController@update_order');
Route::get('checkout_order','OrderController@checkout_order');
Route::get('tambah_alamat','UserController@add_address');
Route::get('konten_kota','OrderController@city_content');
Route::get('konten_kecamatan','OrderController@district_content');
Route::get('hapus_alamat/{no_alamat}','UserController@delete_address');
Route::get('checkout','OrderController@checkout');
Route::get('order_validate/[no_invoice]','OrderController@order_validate');
Route::get('discount','OrderController@discount');
Route::get('order_review/{id}','OrderController@order_review');
Route::get('order_detail','UserController@modal_detail');
Route::get('konfirmasi_pembayaran','PaymentController@payment_form');
Route::get('pembayaran','PaymentController@payment');
Route::get('check_order','OrderController@check_order');
Route::post('get_shipping','OrderController@get_cost');
Route::post('cek_ongkir','OrderController@check_shipping');
Route::get('konten_alamat','UserController@address_content');
Route::post('shipping_new_address','OrderController@check_shipping_new');
//END ADE

//UDIN
Route::get('master/produk/create','ProductController@create');
Route::get('keranjang','OrderController@cart_form');
Route::get('lupa_pass','UserController@forgot_pass_form');
//END UDIN

//ADMIN
Route::get('master','Admin\AdminController@home');
Route::get('master/produk/list','Admin\AdminController@list_product');
Route::get('master/login', function(){
	return view('admin.login');
})->middleware('isLoggedIn');
//ADMIN VIEW (Detail)
Route::get('master/category/view/{id}','Admin\AdminController@view_category');
Route::get('master/subcategory/view/{id}','Admin\AdminController@view_subcategory');
//ADMIN LIST
Route::get('master/coupon','Admin\CouponController@list_coupon');
Route::get('master/setting/bank_account','Admin\SettingController@bank_account_form');
Route::get('master/user/list','Admin\AdminController@list_user');
Route::get('master/setting/bank_account','Admin\SettingController@bank_account_form');
Route::get('master/setting/category/list','Admin\SettingController@list_category');
Route::get('master/setting/subcategory/list','Admin\SettingController@list_subcategory');
Route::get('master/transaction/order','Admin\TransactionController@order');
Route::get('master/transaction/pembayaran','Admin\TransactionController@payment_list');
//ADMIN ADD
Route::get('master/setting/bank_account/add','Admin\SettingController@add_bank_account');

Route::post('master/category/add','Admin\AdminController@add_category');
Route::post('master/subcategory/add','Admin\AdminController@add_subcategory');

Route::post('master/coupon/create','Admin\CouponController@create');
Route::match(['get', 'post'],'master/user/create','Admin\AdminController@add_user');

Route::get('master/setting/category/create','Admin\SettingController@create_category');
Route::get('master/setting/subcategory/create','Admin\SettingController@create_subcategory');

//ADMIN EDIT
Route::match(['get', 'post'],'master/category/edit/{id}','Admin\AdminController@edit_category');
Route::match(['get', 'post'],'master/subcategory/edit/{id}','Admin\AdminController@edit_subcategory');
//ADMIN DELETE
Route::get('master/category/delete/{id}','Admin\AdminController@delete_category');
Route::get('master/subcategory/delete/{id}','Admin\AdminController@delete_subcategory');
Route::get('master/setting/bank_account/{id}','Admin\SettingController@del_bank_account');
