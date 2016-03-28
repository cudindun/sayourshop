<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Product;
use App\Http\Models\Province;
use App\Http\Models\City;
use App\Http\Models\UserMeta;
use App\Http\Models\Order;
use App\Http\Models\OrderDetail;
use DB, Cart, Sentinel, Validator;

class OrderController extends HomeController
{
    public function cart_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery-ui', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'imagesloaded', 'la_boutique', 'jquery-cookie',]);
		$this->data['address']		= UserMeta::where('user_id', Sentinel::getUser()->id)->where('meta_key','address')->first();
		$this->data['provinces']	= Province::get();
		$this->data['cart']			= Cart::content();
		$this->data['title']		= 'Keranjang';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/cart', array('data' => $this->data));
	}

	// public function weight($id){
		
	// 	$query = 
	// 	return $query->weight;
	// }

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
		return redirect('detail/'.$request->id)->with('success', 'Barang telah ditambahkan ke dalam keranjang');
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
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery']);
		$this->data['provinces']	= Province::get();
		$this->data['title']		= 'Daftar Pesanan';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/checkout', array('data' => $this->data));
	}

	public function checkout(Request $request)
	{
		$user = Sentinel::getUser();
		$order = new Order;
		$order->user_id = $user->id;
		$order->order_status = 'Menunggu Konfirmasi Admin';
		$order->order_name = $user->first_name.' '.$user->last_name;
		$order->order_phone = $user->phone;
		if (is_numeric($request->no_address)) {
			$meta = UserMeta::where('user_id', $user->id)->where('meta_key','address')->first();
			$unserialize = unserialize($meta->meta_value);
			$address = $unserialize[$request->no_address];
			$courier = 'courier_'.$request->no_address;
			$order->order_address = $address['alamat'];
			$order->courier = $request->$courier;
			echo "return menggunakan array alamat";
		}else{
			$rules = array(
			'name' => 'required',
			'province' => 'required',
			'address' => 'required',
			'phone' => 'required'
			);
			$validator 	= Validator::make($request->all(), $rules);
			if (!$validator->fails()) {
				$alamat = [
					'nama' => $request->name,
					'telepon' => $request->phone,
					'provinsi' => $request->province,
					'alamat' => $request->address
					];
				if ($user_meta = UserMeta::where('user_id', Sentinel::getUser()->id)->where('meta_key','address')->first()) {
					$unserialize = unserialize($user_meta->meta_value);
					$sum_array = array_push($unserialize, $alamat);
					$serialize = serialize($unserialize);
					$total = UserMeta::where('user_id', $user_meta->user_id)->where('meta_key','address')->update(['meta_value' => $serialize]);
					$order->order_address = $request->address;
					$order->courier = $request->courier;
					echo "menambah array alamat";
				}else{
					$usermeta = new UserMeta;
					$usermeta->user_id = Sentinel::getUser()->id;
					$usermeta->meta_key = "address";
					$usermeta->meta_value = serialize(array($alamat));
					$usermeta->save();
					$order->order_address = $request->address;
					$order->courier = $request->courier;
					echo "return membuat array alamat";
				}
			}else{
				echo "return keranjang alamat gagal";
			}
		}

		if ($request->coupon_code) {
			$order->discount_code = $request->coupon_code;
			$order->total_discount = $request->discount;
			$order->total_price = Cart::total()-$request->discount;
		}else{
			$order->total_price = Cart::total();	
		}
		$order->save();

		$insert_id = $order->id;
		$order = Order::find($insert_id);
		$sum = 0;
		foreach (Cart::content() as $key) {
			$product = Product::where('id', $key->id)->first();
			$result = $product->weight*$key->qty;
			$sum += $result;
			$rowid = 'properties_'.$key->rowid;
			$orderdetail = new OrderDetail;
			$orderdetail->order_id = $insert_id;
			$orderdetail->properties = $request->$rowid;
			$orderdetail->product_id = $key->id;
			$orderdetail->quantity = $key->qty;
			$orderdetail->total_price = $key->price*$key->qty;
			$orderdetail->total_weight = $result;
			$orderdetail->save();
		}
		$order->total_weight = $sum;
		$order->no_invoice = date('Ymd').$user->id.$insert_id;
		$order->save();
	}

	public function discount(Request $request)
	{
		$total = Cart::total();
		if($request->coupon = 'tesvoucher')
		{
			$disc = ($total*0.1);
		}
		return redirect('keranjang')->with('discount', $disc)->with('coupon', $request->coupon);
	}
}
