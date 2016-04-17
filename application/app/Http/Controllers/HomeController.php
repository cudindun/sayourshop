<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use App\Http\Models\Product;
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
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'home', array('data' => $this->data));
	}
	
}
