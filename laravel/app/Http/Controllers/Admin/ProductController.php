<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\Category;
use App\Http\Models\Subcategory;
use App\Http\Models\Product;
use App\Http\Models\OrderDetail;
use App\Http\Models\Distributor;
use DB, Input, Validator, Storage, File, Image;

class ProductController extends AdminController
{
	
    public function create()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins','ionicons']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Product | Create';
		$this->data['category']		= Category::get();
		$this->data['distributor']	= Distributor::get();
		$this->data['array']		= '';
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/product_insert', array('data' => $this->data));
	}

	public function modal_product(Request $request)
	{
		$this->data['product'] = Product::where('id', $request->product_id)->first();
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
			$product->distributor_id = $request->distributor;
			$product->save();

			$insert_id = $product->id;
			$photos = array();
			for ($i=0; $i < 5; $i++) {
				$form = strval('tes_'.$i);
				if (!is_null($request->$form) ) {
					$file = Input::file($form);
				  	$img = Image::make($file);
				  	$filename = rand().'.jpg';
		      		$img->resize(370,474);
	     			$img->save(storage_path('photo_product/'.$filename),50);
			    	array_push($photos, $filename);
				}
			}
			$product->image = serialize($photos);
			$product->save();
			return redirect('master/produk/create')->with('completed','Produk berhasil ditambahkan');
		}else{
			return redirect('master/produk/create')->with('failed','Produk gagal ditambahkan');
		};
	}
	public function check_variant(Request $request)
	{
		$product = Product::where('id', $request->id)->first();
		$unserialize = unserialize($product->properties);
		$this->data['variant_count'] = count($unserialize);
		$variant_product = array();

		if (!empty($unserialize)) {
			foreach ($unserialize as $key => $value) {
			array_push($variant_product, $key);
			}
			$this->data['variant'] = implode(",", $variant_product);
			return $this->data;
		}
		
	}

	public function add_variant(Request $request)
	{
		$product = Product::where('id', $request->id)->first();
		$size = explode(",", $request->size);
		$arraysize = array();
		foreach ($size as $key) {
			if ($key != '') {
				$qty = $key."_qty";
				$arraysize[$key] = $request->$qty;
			}
		}
		if ($product->properties) {
			$unserialize = unserialize($product->properties);
			$unserialize[ucwords($request->color)] = $arraysize;
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
		if ($product->properties != '') {
			$product->status = "publish";
			$product->save();
			return 'success';
		}else{
			return 'failed';
		}
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
		$properties = serialize($unserialize);
		$total = ($product->quantity - $request->qty_tmp) + $request->qty;

		$product->quantity = $total;
		$product->properties = $properties;
		$product->save();

		return $total;
	}

	public function delete($id)
	{
		$product = Product::find($id);
		$inOrder = OrderDetail::where('product_id', $id)->count();

		if(!$product){
			return redirect('master/produk/list')->with('error', 'Data tidak ada');
		}else{
			$image = unserialize($product->image);
			$path = base_path().'/storage/photo_product/';
			if($inOrder > 0){
				$product->status = 'unactive';
				if($product->save()){
					return redirect('master/produk/list')->with('success', 'Produk tidak bisa di hapus karena masih dalam order, produk sementara di non aktifkan');
				}else{
					return redirect('master/produk/list')->with('error', '404');					
				}
			}elseif($inOrder == 0){
				if($product->delete()){
					if(!$image == NULL){
						foreach($image as $image){
							File::delete($path.$image);
						}
					}
					return redirect('master/produk/list')->with('success', 'Produk '.$product->name.' Berhasil Dihapus');
				}else{
					return redirect('master/produk/list')->with('error', '404');	
				}
			}
		}
	}
}
