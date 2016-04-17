<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Product;
use App\Http\Models\Province;
use App\Http\Models\City;
use App\Http\Models\District;
use App\Http\Models\UserMeta;
use App\Http\Models\Order;
use App\Http\Models\OrderDetail;
use DB, Cart, Sentinel, Validator;

class OrderController extends HomeController
{
    public function cart_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery','jquery-min','jquery-ui', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'imagesloaded', 'la_boutique', 'jquery-cookie']);
		$this->data['address']		= UserMeta::where('user_id', Sentinel::getUser()->id)->where('meta_key','address')->first();
		$this->data['provinces']	= Province::get();
		$sum = 0;
				foreach (Cart::content() as $key) {
					$product = Product::where('id', $key->id)->first();
					$result = $product->weight*$key->qty;
					$sum += $result;
				}
		$this->data['weight']		= $sum;
		$this->data['cart']			= Cart::content();
		$this->data['title']		= 'Keranjang';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/cart', array('data' => $this->data));
	}

	public function order_review($id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery','jquery-min','jquery-ui', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'imagesloaded', 'la_boutique', 'jquery-cookie',]);
		$this->data['address']		= UserMeta::where('user_id', Sentinel::getUser()->id)->where('meta_key','address')->first();
		$this->data['order']		= Order::where('id', $id)->first();
		$this->data['orderdetail']  = OrderDetail::where('order_id', $this->data['order']->id)->get();
		$this->data['title']		= 'Checkout';
		Cart::destroy();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/order_review', array('data' => $this->data));
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
		// echo "<pre>";
		// print_r(Cart::content());
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
		$order->order_status = 'Menunggu Pembayaran';
		if (is_numeric($request->address_check)) {
			$meta = UserMeta::where('user_id', $user->id)->where('meta_key','address')->first();
			$unserialize = unserialize($meta->meta_value);
			$address = $unserialize[$request->address_check];
			$order->order_name = $address['nama'];
			$order->order_phone = $address['telepon'];
			$order->order_address = $address['alamat'];
			$order->province_id = $address['provinsi'];
			$order->city_id = $address['kota'];
			$order->district_id = $address['kecamatan'];
			$order->courier = $request->courier_check;
			$order->shipping_price = $request->shipping_price;
			
			if ($request->coupon_code) {
				$order->discount_code = $request->coupon_code;
				$order->total_discount = $request->discount;
				$order->total_price = Cart::total()-$request->discount;
			}else{
				$order->total_price = $request->cart_total + $request->shipping_price;	
			}
			$order->save();

			$insert_id = $order->id;
			$order = Order::find($insert_id);
			foreach (Cart::content() as $key) {
				$product = Product::where('id', $key->id)->first();
				$result = $product->weight*$key->qty;
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
			$order->total_weight = $request->weight;
			$order->no_invoice = date('Ymd').$user->id.$insert_id;
			$order->save();
			return redirect('order_review/'.$insert_id);
		}else{
			$rules = array(
			'name' => 'required',
			'province' => 'required',
			'city' => 'required',
			'district' => 'required',
			'address' => 'required',
			'phone' => 'required'
			);
			$validator 	= Validator::make($request->all(), $rules);
			if (!$validator->fails()) {
				$order->order_address = $request->address;
				$order->courier = $request->courier_check_new;
				$order->order_name = $request->name;
				$order->order_phone = $request->phone;
				$order->province_id = $request->province;
				$order->city_id = $request->city;
				$order->district_id = $request->district;
				$order->shipping_price = $request->shipping_price_new;
				$alamat = [
					'nama' => $request->name,
					'telepon' => $request->phone,
					'provinsi' => $request->province,
					'kota' => $request->city,
					'kecamatan' => $request->district,
					'alamat' => $request->address
					];
				if ($user_meta = UserMeta::where('user_id', Sentinel::getUser()->id)->where('meta_key','address')->first()) {
					$unserialize = unserialize($user_meta->meta_value);
					$sum_array = array_push($unserialize, $alamat);
					$serialize = serialize($unserialize);
					$total = UserMeta::where('user_id', $user_meta->user_id)->where('meta_key','address')->update(['meta_value' => $serialize]);
				}else{
					$usermeta = new UserMeta;
					$usermeta->user_id = Sentinel::getUser()->id;
					$usermeta->meta_key = "address";
					$usermeta->meta_value = serialize(array($alamat));
					$usermeta->save();
				}

				if ($request->coupon_code) {
					$order->discount_code = $request->coupon_code;
					$order->total_discount = $request->discount;
					$order->total_price = Cart::total()-$request->discount;
				}else{
					$order->total_price = $request->cart_total_new + $request->shipping_price_new;	
				}
				$order->save();

				$insert_id = $order->id;
				$order = Order::find($insert_id);
				foreach (Cart::content() as $key) {
					$product = Product::where('id', $key->id)->first();
					$result = $product->weight*$key->qty;
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
				$order->total_weight = $request->weight_new;
				$order->no_invoice = date('Ymd').$user->id.$insert_id;
				$order->save();
				return redirect('order_review/'.$insert_id);
			}else{
				return redirect('keranjang')->with('fail', 'Silahkan isi alamat baru sesuai form yang disediakan');
			}
		}
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

	public function city_content(Request $request)
	{
		$this->data['city_data'] = City::where('id_province', $request->id)->get();
		return view('city_content')->with('data', $this->data);
	}

	public function district_content(Request $request)
	{
		$this->data['district_data'] = District::where('id_city', $request->id)->get();
		return view('district_content')->with('data', $this->data);
	}

	public function check_order(Request $request){
		$order = Order::where('no_invoice', $request->invoice)->first();
		if ($order) {
			$this->order_review($order->id);
			return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'order/order_review', array('data' => $this->data));
		}else
			return redirect('cek_order_form')->with('failed','Maaf No Invoice tidak terdaftar');
	}

	public function get_cost($id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => 'origin=79&destination='.$id.'&weight=1000&courier=jne',
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 3817d2082f278a925d3407ecb04732d3"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);


		if ($err) {
		 	echo "cURL Error #:" . $err;
		} else {
			return $response;
		  	
		}
	}

	public function check_shipping(Request $request){
		$cost = json_decode($this->get_cost($request->id));
		$this->data['cost_data'] = serialize($cost->rajaongkir->results[0]->costs);
		return view('cost_content')->with('data', $this->data);
	}

	public function check_shipping_new(Request $request)
	{
		$cost = json_decode($this->get_cost($request->id));
		$this->data['cost_data'] = serialize($cost->rajaongkir->results[0]->costs);
		$this->data['weight']	 = $request->weight;
		return view('check_shipping_new')->with('data', $this->data);
	}
}
