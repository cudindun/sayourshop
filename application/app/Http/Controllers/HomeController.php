<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use App\Http\Models\Product;
use App\Http\Models\Option;
use DB, Cart;

class HomeController extends Controller
{
	public function __construct(Request $request)
	{
		$this->data['category'] 		= Category::get();
		$this->data['request'] 			= $request;
		$this->data['cart'] 			= Cart::count();
		//$this->data['main-cart-content'] = dd($this->get_cart());
	}

    public function index()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Home';
		$this->data['product']		= Product::orderBy('created_at','DESC')->Paginate(5);
		$this->data['banner']		= Option::where('meta_key','banner_home')->first();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'home', array('data' => $this->data));
	}

	public function contact_us(Request $request)
	{
		if($request->all()){
			return 'yay';
		}else{
			$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
			$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
			$this->data['title']		= 'Kontak Kami';
		    return view('main_layout')->with('data', $this->data)
									  ->nest('content', 'contact_us', array('data' => $this->data));
		}
	}
	
}
