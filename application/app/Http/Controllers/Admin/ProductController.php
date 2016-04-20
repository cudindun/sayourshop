<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use App\Http\Models\Subcategory;
use App\Http\Models\Product;
use App\Http\Models\ProductSize;
use App\Http\Models\OrderDetail;
use DB, Input, Validator, Storage, File;

class ProductController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}
	
    public function create()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins','ionicons']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Product | Create';
		$this->data['category']		= Category::get();
		$this->data['array']		= '';
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/product_insert', array('data' => $this->data));
	}

	public function modal_product(Request $request)
	{
		$this->data['product'] = Product::where('id', $request->product_id)->first();
		$this->data['size'] = ProductSize::where('product_id', $request->product_id)->get();
		$this->data['order']  = OrderDetail::where('product_id', $request->product_id)->orderBy('created_at','DESC')->get();
		return view('admin/product/modal_product')->with('data', $this->data);
	}

	public function add_product(Request $request)
	{
		$form = array(
			'name'	=> $request->prodname,   
			'desc'	=> $request->desc_input,
			'price'	=> $request->price_input,
			'category_id'	=> $request->category,
			'subcategory_id'	=> $request->subcategory,
			'weight'	=> $request->weight,
			);
		$rules = array(
			'name'	=> 'required', 
			'desc'	=> 'required',
			'price'	=> 'required',
			'category_id'	=> 'required',
			'subcategory_id'	=> 'required',
			'weight'	=> 'required',
			);
		$validator 	= Validator::make($form, $rules);
		if (!$validator->fails()) {
			$category = Category::where('id', $request->category)->first();
			$category->total_product += 1;
			$category->save();
			$category = Subcategory::where('id', $request->category)->first();
			$category->total_product += 1;
			$category->save();
			$product = new Product;
			$product->category_id = $request->category;
			$product->name = $request->prodname;
			$product->slug = str_replace(" ", "-", $request->prodname);
			$product->desc = $request->desc_input;
			$product->price = $request->price_input;
			$product->subcategory_id = $request->subcategory;
			$product->weight = $request->weight;
			$product->save();

			$insert_id = $product->id;
			$photos = array();
			for ($i=0; $i < 5; $i++) {
				$form = strval('tes_'.$i);
				if (!is_null($request->$form) ) {
					$file = array('image' => Input::file($form));
				  	$rules = array('image' => 'mimes:jpeg,jpg,png|required|max:10000'); //mimes:jpeg,bmp,png and for max size max:10000
				  	$validator = Validator::make($file, $rules);
				  	if (!$validator->fails()) {
					  	$destinationPath = storage_path('photo_product') ; // upload path
				        $extension = Input::file($form)->getClientOriginalExtension(); // getting image extension
						$fileName = $insert_id.'_'.$i.'.'.$extension; // renameing image
				    	Input::file($form)->move($destinationPath, $fileName); // uploading file to given path
				    	array_push($photos, $fileName);
			    	}
				}
			}
			$product->image = serialize($photos);
			$product->save();
			return redirect('master/produk/create')->with('completed','Produk berhasil ditambahkan');
		}else{
			return redirect('master/produk/create')->with('failed','Produk gagal ditambahkan');
		};
	}

	public function add_variant(Request $request)
	{
		$product = Product::where('id', $request->id)->first();
		$size = explode(",", $request->size);
		array_pop($size);
		$arraysize = array();
		foreach ($size as $key) {
			$qty = $key."_qty";
			$arraysize[$key] = $request->$qty;
		}

		if ($product->properties) {
			$unserialize = unserialize($product->properties);
			$unserialize[$request->color] = $arraysize;
			$color = serialize($unserialize);
			$product->properties = $color;
			$product->quantity += $request->total;
			$product->save();
			return count($unserialize);	
		}else{
			$arraycolor = array(
				$request->color => $arraysize
			);
			$color = serialize($arraycolor);
			$product->properties = $color;
			$product->quantity = $request->total;
			$product->save();
			return count($arraycolor);
		}
	}

	public function activated_product(Request $request)
	{
		$product = Product::where('id', $request->id)->first();
		$product->status = "publish";
		$product->save();
	}

	public function unactivated_product(Request $request)
	{
		$product = Product::where('id', $request->id)->first();
		$product->status = "unactive";
		$product->save();
	}

	public function ajax_attr(Request $request)
	{
		$product = Product::where('id', $request->id)->first();
		$unserialize = unserialize($product->properties);
		echo "<pre>";
		print_r($unserialize[$request->color]);
		echo "<pre>";
	}

	public function edit_qty(Request $request)
	{
		$product = Product::where('id', $request->product_id)->first();
		$unserialize = unserialize($product->properties);
		$unserialize[$request->color][$request->id] = $request->qty;		
	}
}
