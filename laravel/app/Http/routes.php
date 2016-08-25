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
Route::get('cari','ProductController@search');
Route::get('ajax_cari','ProductController@ajax_search');
Route::get('ajax_category_search', 'ProductController@ajax_category_search');
Route::get('produk/{slug}','ProductController@product');
Route::get('produk/{slug}/{subcategory}','ProductController@subproduct');
Route::get('produk/{slug}/{subcategory}/{id}','ProductController@detail');
Route::get('detail/{id}','ProductController@detail_cart');
Route::get('login_form','UserController@login_form');
Route::match(['get', 'post'],'login','UserController@login');
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
Route::post('delete_order','OrderController@delete_order');
Route::get('update_order','OrderController@update_order');
Route::get('checkout_order','OrderController@checkout_order');
Route::get('tambah_alamat','UserController@add_address');
Route::get('konten_kota','OrderController@city_content');
Route::get('konten_kecamatan','OrderController@district_content');
Route::match(['get', 'post'],'hapus_alamat/{no_alamat}','UserController@delete_address');
Route::get('checkout','OrderController@checkout');
Route::get('order_validate/[no_invoice]','OrderController@order_validate');
Route::get('discount','OrderController@discount');
Route::get('order_review/{id}','OrderController@order_review');
Route::get('order_detail','UserController@modal_detail');
Route::get('konfirmasi_pembayaran','PaymentController@payment_form');
Route::post('pembayaran','PaymentController@payment');
Route::get('check_order','OrderController@check_order');
Route::post('get_shipping','OrderController@get_cost');
Route::post('cek_ongkir','OrderController@check_shipping');
Route::get('konten_alamat','UserController@address_content');
Route::post('shipping_new_address','OrderController@check_shipping_new');
Route::post('size_product','ProductController@size_product');
Route::post('modal_review','OrderController@modal_review');
Route::post('add_review','OrderController@add_review');
Route::post('product_content','ProductController@product_content');
Route::post('subproduct_content','ProductController@subproduct_content');
Route::post('review_content','ProductController@review_content');
Route::post('wishlist', 'ProductController@wishlist');
Route::post('del_wishlist', 'ProductController@del_wishlist');
Route::post('sort_product','ProductController@sort_product');
Route::post('sort_search','ProductController@sort_search');
Route::post('check_invoice', 'PaymentController@check_invoice');
Route::post('check_paid', 'PaymentController@check_paid');
Route::post('update_order', 'UserController@update_order');
Route::post('send_message', 'UserController@ask_product');
//END ADE

//UDIN
Route::get('keranjang','OrderController@cart_form');
Route::get('lupa_pass','UserController@forgot_pass_form');
Route::match(['get', 'post'],'contact','HomeController@contact_us');
//END UDIN

//ADMIN
Route::get('master','Admin\AdminController@home');
Route::get('master/produk/list','Admin\AdminController@list_product');
Route::post('master/produk/tambah','Admin\ProductController@add_product');
Route::get('master/login',function(){
	return view('admin.login');
})->middleware('isLoggedIn');
Route::post('master/login','UserController@admin_login');
Route::get('master/message/list', 'Admin\AdminController@list_message');
Route::get('modal_variant', 'Admin\ProductController@modal_variant');
Route::post('add_variant', 'Admin\ProductController@modal_variant');
Route::get('month_order', 'Admin\AdminController@order_month');

//ADMIN VIEW (Detail)
Route::get('master/category/view/{id}','Admin\AdminController@view_category');
Route::get('master/subcategory/view/{id}','Admin\AdminController@view_subcategory');
Route::get('master/distributor/view/{id}','Admin\DistributorController@view');
Route::get('master/message/view/{id}','Admin\AdminController@view_message');
Route::get('ajax_modal_attr','Admin\ProductController@ajax_attr');


//ADMIN LIST
Route::get('master/setting/coupon','Admin\CouponController@list_coupon');
Route::get('master/distributor/list','Admin\DistributorController@list_distributor');
Route::get('master/setting/bank_account','Admin\SettingController@bank_account_form');
Route::get('master/setting/category/list','Admin\SettingController@list_category');
Route::get('master/setting/subcategory/list','Admin\SettingController@list_subcategory');
Route::get('master/transaction/order','Admin\TransactionController@order');
Route::get('master/transaction/pembayaran','Admin\TransactionController@payment_list');
Route::get('master/user/list','Admin\AdminController@list_user');
Route::get('master/produk_detail','Admin\ProductController@modal_product');
Route::get('banner_list', 'Admin\SettingController@list_banner');
Route::get('home_banner', 'Admin\SettingController@home_banner');
Route::get('list_order', 'Admin\TransactionController@list_order');
Route::get('category_product', 'Admin\ProductController@category_product');
Route::get('get_list_subcategory', 'Admin\ProductController@get_list_subcategory');
Route::get('get_product_subcategory', 'Admin\ProductController@get_product_subcategory');
Route::get('get_product_by_status', 'Admin\ProductController@get_product_by_status');

//ADMIN ADD
Route::post('master/transaction/payment','Admin\TransactionController@payment');

Route::get('master/produk/create','Admin\ProductController@create');
Route::get('master/setting/bank_account/add','Admin\SettingController@add_bank_account');

Route::post('master/category/add','Admin\AdminController@add_category');
Route::post('master/subcategory/add','Admin\AdminController@add_subcategory');

Route::post('master/setting/coupon/create','Admin\CouponController@create');
Route::match(['get', 'post'],'master/user/create','Admin\AdminController@add_user');

Route::get('master/setting/category/create','Admin\SettingController@create_category');
Route::get('master/setting/subcategory/create','Admin\SettingController@create_subcategory');

Route::match(['get', 'post'],'master/distributor/create','Admin\DistributorController@create');
Route::post('add_variant', 'Admin\ProductController@add_variant');
Route::post('insert_banner', 'Admin\SettingController@add_home_banner');

//ADMIN EDIT
Route::match(['get', 'post'],'master/category/edit/{id}','Admin\AdminController@edit_category');
Route::match(['get', 'post'],'master/subcategory/edit/{id}','Admin\AdminController@edit_subcategory');
Route::match(['get', 'post'],'master/distributor/edit/{id}','Admin\DistributorController@edit');
Route::post('master/setting/coupon/edit/{id}','Admin\CouponController@edit');
Route::post('activated_product', 'Admin\ProductController@activated_product');
Route::post('unactivated_product', 'Admin\ProductController@unactivated_product');
Route::post('edit_qty', 'Admin\ProductController@edit_qty');

//ADMIN DELETE
Route::get('master/category/delete/{id}','Admin\AdminController@delete_category');
Route::get('master/subcategory/delete/{id}','Admin\AdminController@delete_subcategory');
Route::get('master/setting/bank_account/{id}','Admin\SettingController@del_bank_account');
Route::get('master/setting/coupon/{id}','Admin\CouponController@delete');
Route::get('master/distributor/delete/{id}','Admin\DistributorController@delete');
Route::post('delete_home_banner','Admin\SettingController@delete_home_banner');
Route::get('master/message/delete/{id}','Admin\AdminController@delete_message');
Route::get('master/produk/delete/{id}','Admin\ProductController@delete');
Route::post('delete_banner', 'Admin\SettingController@delete_category_banner');

//ADMIN AJAX
Route::get('konten_kategori','Admin\SettingController@category_content');
Route::post('insert_shipping','Admin\TransactionController@insert_shipping');
Route::post('send','Admin\TransactionController@send');
Route::get('category_banner', 'Admin\SettingController@category_banner');
Route::post('insert_category_banner', 'Admin\SettingController@insert_category_banner');
Route::post('check_variant', 'Admin\ProductController@check_variant');

//email
Route::get('account-activation/{id}&key={code}', 'UserController@account_activation');
Route::post('master/message/reply', 'Admin\AdminController@mail_reply');


//image
Route::get('photo_banner/{imagefile}', function ($imagefile)
{
    return Image::make(storage_path() . '/photo_banner/' . $imagefile)->response();
});
Route::get('photo_product/{imagefile}', function ($imagefile)
{
    return Image::make(storage_path() . '/photo_product/' . $imagefile)->response();
});
Route::get('photo_profile/{imagefile}', function ($imagefile)
{
    return Image::make(storage_path() . '/photo_profile/' . $imagefile)->response();
});


//Datatables Server-Side
Route::controller('datatables', 'Admin\AdminController', [
    'order_month'  => 'datatables.data',
    'home' => 'datatables',
]);
Route::controller('datatables', 'Admin\TransactionController', [
    'list_order'  => 'datatables.data',
]);