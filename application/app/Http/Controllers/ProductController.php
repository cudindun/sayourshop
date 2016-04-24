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
use App\Http\Models\Option;
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
		$this->data['banner']		= Option::where('meta_key','banner_'.$slug)->first();
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
		$this->data['banner']		= Option::where('meta_key','banner_'.$slug)->first();
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

	public function size_product(Request $request)
	{
		$this->data['product'] = Product::where('id', $request->id)->first();
		$this->data['color'] = $request->color;
		$properties = unserialize($this->data['product']->properties);
		$this->data['properties'] = unserialize($this->data['product']->properties);
		$this->data['reverse'] = array_reverse($properties[$request->color]);
		return view('product/size_content')->with('data', $this->data);
	}
	
}
