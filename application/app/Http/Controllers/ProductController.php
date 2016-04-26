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
use App\Http\Models\Reviews;
use App\Http\Models\UserMeta;
use DB, Input, Validator, Storage, File, Sentinel;

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
		$this->data['slugsubcategory']	='';
		$this->data['title']		= ucwords($this->data['slugcategory']->name);
		$this->data['banner']		= Option::where('meta_key','banner_'.$slug)->first();
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
		
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'product/product', array('data' => $this->data));
	}

	public function detail($slug, $subcategory, $id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'font-awesome', 'font-awesome-min', 'flexslider', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'jquery-ui', 'jquery-easing', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'jquery-gmap3', 'imagesloaded', 'la_boutique', 'jquery-cookie', 'jquery-parallax-lib']);
		$this->data['title']		= 'Produk';
		$this->data['count']		= Reviews::where('product_id',$id)->get();
		
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

	public function subproduct_content(Request $request)
	{
		$this->data['product']		= Product::where('category_id', $request->category_id)->where('subcategory_id', $request->subcategory_id)->Paginate(4);
		return view('product/product_content')->with('data', $this->data);
	}

	public function product_content(Request $request)
	{
		$this->data['product']		= Product::where('category_id', $request->category_id)->orderBy('DESC')->Paginate(20);
		return view('product/product_content')->with('data', $this->data);
	}

	public function review_content(Request $request)
	{
		$this->data['review']		= Reviews::where('product_id',$request->product_id)->Paginate(5);
		return view('product/review_content')->with('data', $this->data);
	}

	public function wishlist(Request $request)
	{
		$product = Product::where('id', $request->product_id)->first();
		$user = Sentinel::getUser();
		$wishlist = UserMeta::where('meta_key','wishlist')->where('user_id', $user->id)->first();
		if ($wishlist == '') {
			$wish = array();
			array_push($wish, $product->slug);
			$wishlist = new UserMeta;
			$wishlist->user_id = $user->id;
			$wishlist->meta_key = 'wishlist';
		}else{
			$wish = unserialize($wishlist->meta_value);
			array_push($wish, $product->slug);
		}
		$wishlist->meta_value = serialize($wish);
		$wishlist->save();
	}	
}
