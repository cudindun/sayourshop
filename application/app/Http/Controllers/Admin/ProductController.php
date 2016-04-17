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
			'quantity'	=> $request->quantity_tmp,
			'category_id'	=> $request->category,
			'subcategory_id'	=> $request->subcategory,
			'weight'	=> $request->weight,
			'size'	=> $request->optradio,
			'color'	=> $request->color
			);
		$rules = array(
			'name'	=> 'required', 
			'desc'	=> 'required',
			'price'	=> 'required',
			'quantity'	=> 'required',
			'category_id'	=> 'required',
			'subcategory_id'	=> 'required',
			'weight'	=> 'required',
			'size'	=> 'required',
			'color'	=> 'required'
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
			$product->quantity = $request->quantity_tmp;
			$product->subcategory_id = $request->subcategory;
			$product->weight = $request->weight;
			$product->save();

			$insert_id = $product->id;
			$arraysize = array();
			if ($request->optradio == "automatic") {
				for ($i=0; $i < 4; $i++) { 
					$size = new ProductSize;
					$size->product_id = $insert_id;
					$size->size = $request->$i;
					$size->quantity = 5;
					$size->save();
					array_push($arraysize, $request->$i);
				}
			}else{
				if ($request->allsize) {
					$size = new ProductSize;
					$size->product_id = $insert_id;
					$size->size = $request->allsize;
					$size->quantity = $request->allsize_qty;
					$size->save();
					array_push($arraysize, $request->$allsize);
				}else{
					for ($i=0; $i < 4; $i++) {
						$qty = strtolower($request->$i.'_qty');
						if (!$request->$qty == 0) {
							$size = new ProductSize;
							$size->product_id = $insert_id;
							$size->size = $request->$i;
							$size->quantity = $request->$qty;
							$size->save();
							array_push($arraysize, $request->$allsize);
						}
					}
				}
			}
			$color = explode(',', $request->color);
			$properties = array(
				'ukuran' => $arraysize,
				'warna' => $color 
				);
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
			$product->properties = serialize($properties);
			$product->image = serialize($photos);
			$product->save();
			return redirect('master/produk/create')->with('completed','Produk berhasil ditambahkan');
		}else{
			return redirect('master/produk/create')->with('failed','Produk gagal ditambahkan');
		};
	}

	public function variant(Request $request)
	{
		$size = array(
			$request->size => "5",
			);
		$cobaarray = array(
			$request->index => $size, 
			);
		echo "tes function";
		echo "<pre>";
		print_r($cobaarray);
		echo "<pre>";
	}
}
