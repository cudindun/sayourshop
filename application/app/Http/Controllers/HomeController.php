<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use DB;

class HomeController extends Controller
{
	//  public function login_form()
	// {
	// 	$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'color-schemes-core', 'font-awesome', 'font-awesome-min', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
	// 	$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
	// 	$this->data['title']		= 'SayourShop | Login';
	//     return view('main_layout')->with('data', $this->data)
	// 							  ->nest('content', 'user/login', array('data' => $this->data));
	// }

    public function index()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Home';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'home', array('data' => $this->data));
	}
	
}
