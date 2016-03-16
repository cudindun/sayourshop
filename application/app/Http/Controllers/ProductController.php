<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use DB, Input, Validator, Storage, File;

class ProductController extends HomeController
{
    public function product($slug)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
		$this->data['slugcategory']	= Category::where('slug',$slug)->first();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product', array('data' => $this->data));
	}

	public function insert()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product_insert', array('data' => $this->data));
	}

	public function detail()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product_detail', array('data' => $this->data));
	}

	public function tes_produk()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/tes_produk', array('data' => $this->data));
	}

	public function save_photo(Request $request) {
	  // getting all of the post data
	  	$file = array('image' => Input::file('image'));
	  	
	  	$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
	  	$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
	    	// return redirect('dashboard')->with('failed','Upload Gagal');
	    	echo "gagal tampilan";
	  	}
	  	else {
		     if (Input::file('image')->isValid()) {
				$destinationPath = 'photo_profile'; // upload path

		        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = 'foto_baru'.'.'.$extension; // renameing image
		    	Input::file('image')->move(storage_path(), $fileName); // uploading file to given path
		    	// Storage::put($destinationPath.'/'.$fileName , $fileName);
			    echo "berhasil";
			}
			else {
		    	echo "gagal";
		    }
		}
	}
	
}
