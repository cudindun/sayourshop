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
Route::get('produk','ProductController@product');
Route::get('login_form','UserController@login_form');
Route::get('login','UserController@login');
Route::get('logout','UserController@logout');
Route::get('daftar','UserController@register_form');
Route::get('register','UserController@register');
Route::get('dashboard/{id}','UserCOntroller@dashboard');
//END ADE

//UDIN
Route::get('produk/view','ProductController@detail');
Route::get('keranjang','OrderController@cart_form');
Route::get('lupa_pass','UserController@forgot_pass_form');
//END UDIN



