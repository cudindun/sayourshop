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
Route::get('/', 'HomeController@index');
// Route::get('/', function () {
//     return view('home');
// });

Route::get('product', function () {
    return view('product');
});

Route::get('product/view', function () {
    return view('product.view');
});

Route::get('cart', function () {
    return view('cart');
});

Route::get('login', function () {
    return view('user.login');
});

Route::get('register', function () {
    return view('user.register');
});

Route::get('forgot', function () {
    return view('user.forgot_pass');
});