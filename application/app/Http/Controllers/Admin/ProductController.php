<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use App\Http\Models\Subcategory;
use App\Http\Models\Product;
use DB, Input, Validator, Storage, File;

class ProductController extends HomeController
{
    public function product($slug)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['slugcategory']	= Category::where('slug',$slug)->first();
		$this->data['title']		= ucwords($this->data['slugcategory']->name);
		$this->data['product']		= Product::where('category_id', $this->data['slugcategory']->id)->get();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product', array('data' => $this->data));
	}

	public function create()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Product | Create';
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'product/product_insert', array('data' => $this->data));
	}

	// public function save_photo() {
	// 	for ($i=1; $i <6 ; $i++) { 
	// 		if (Input::file('image'.$i)->isValid()) {
	// 			$destinationPath = storage_path('app/photo_product'); // upload path
	// 	        $extension = Input::file('image'.$i)->getClientOriginalExtension(); // getting image extension
	// 			$fileName = 'tes-baju-t-shirt'.$i.'.'.$extension; // renameing image
	// 	    	$tes = Input::file('image'.$i)->move($destinationPath, $fileName); // uploading file to given path
	// 	    	$image = array(
	// 	    		'$i' => $fileName,
	// 	    		);
	// 		}
	// 	}     s
	// }
	
}
