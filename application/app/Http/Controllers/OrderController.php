<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Product;
use DB, Cart;

class OrderController extends HomeController
{
    public function cart_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['cart']			= Cart::content();
		$this->data['title']		= 'Keranjang';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/cart', array('data' => $this->data));
	}

	public function check_order_form(){
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Sayourshop | Check Order';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/check_order', array('data' => $this->data));
	}

	public function order(Request $request){
		$product = Product::where('id', $request->id)->first();
		if ($properties = unserialize($product->properties)) {
			$properti = array();
			foreach ($properties as $key => $value) {
				$attr = $request->$key;
				$properti[$key] = $attr;
			}
		}
		$order = array(
			'id' => $request->id, 
			'name' => $request->name, 
			'qty' => $request->quantity, 
			'price' => $request->price, 
			'options' => $properti
			);
		Cart::add($order);
		return redirect('keranjang')->with('success', 'Barang telah ditambahkan ke dalam keranjang');
	}

	public function delete_order($row_id){
		Cart::remove($row_id);
		return redirect('keranjang')->with('success', 'Barang telah dihapus dari keranjang');
	}

	public function update_order(Request $request){
		
		$cart = Cart::content();
		foreach ($cart as $key) {
			$quantity = 'quantity_'.$key->rowid;
			$update=Cart::update($key->rowid, $request->$quantity);
		}
		return redirect('keranjang')->with('success', 'Keranjang telah diperbaharui');
	}

	public function checkout_order(){
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['cart']			= Cart::content();
		$this->data['title']		= 'Keranjang';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/checkout_address', array('data' => $this->data));
	}
	
}
