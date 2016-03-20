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
Route::get('produk/{slug}/{subcategory}/{product}','ProductController@detail');
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
//END ADE

//UDIN
Route::get('master/produk/create','ProductController@insert');
Route::get('keranjang','OrderController@cart_form');
Route::get('lupa_pass','UserController@forgot_pass_form');
//END UDIN

//ADMIN
Route::get('master','AdminController@home');
Route::get('master/user/list','AdminController@home');