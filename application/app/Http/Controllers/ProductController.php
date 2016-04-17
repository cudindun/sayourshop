<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use App\Http\Models\Subcategory;
use App\Http\Models\Product;
use DB, Input, Validator, Storage, File;

class ProductController extends HomeController
{
	public function search(Request $request)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= ucwords('Pencarian');
		$this->data['name']			= $request->search;
		$this->data['query']		= Product::where('name','like', '%'.$request->search.'%')->orderBy('DESC')->get();
		$this->data['category']		= Category::get();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'search', array('data' => $this->data));
	}

    public function product($slug)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['slugcategory']	= Category::where('slug',$slug)->first();
		$this->data['title']		= ucwords($this->data['slugcategory']->name);
		$this->data['product']		= Product::where('category_id', $this->data['slugcategory']->id)->orderBy('DESC')->Paginate(10);
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product', array('data' => $this->data));
	}

	public function subproduct($slug, $subcategory)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'jquery-parallax', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['slugcategory']	= Category::where('slug',$slug)->first();
		$this->data['slugsubcategory']	= Subcategory::where('slug',$subcategory)->first();
		$this->data['title']		= $this->data['slugsubcategory']->name;
		$this->data['product']		= Product::where('category_id', $this->data['slugcategory']->id)->where('subcategory_id', $this->data['slugsubcategory']->id)->SimplePaginate(10);;
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product', array('data' => $this->data));
	}

	public function detail($slug, $subcategory, $id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
		$this->data['product']		= Product::where('id',$id)->first();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product_detail', array('data' => $this->data));
	}

	public function detail_cart($id)
	{

		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
		$this->data['product']		= Product::where('id',$id)->first();
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product_detail', array('data' => $this->data));

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
