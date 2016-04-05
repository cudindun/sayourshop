<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\User;
use App\Http\Models\Category;
use App\Http\Models\Product;
use App\Http\Models\Subcategory;

use Input;
use DB;
use Redirect,Validator,Session;

class AdminController extends Controller
{

	// ========== TEMPLATE ============

    public function home()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'icheck', 'morris_chart', 'jvectormap', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'morris_chart_js', 'sparkline', 'jvectormap_js', 'jvectormap_world_js', 'knob', 'dataTables_js']);
		$this->data['title']		= 'SayourShop | Master';
		$this->data['user']			= User::all();
		$this->data['userCount']	= User::all()->count();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/home', array('data' => $this->data));
	}

	public function list_user()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs']);
		$this->data['title']		= 'User | List';
		$this->data['user']			= User::all();
		$this->data['userCount']	= User::all()->count();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/user/user_list', array('data' => $this->data));
	}

	public function list_product()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs']);
		$this->data['title']		= 'Product | List';
		$this->data['product']		= Product::all();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/product/list_produk', array('data' => $this->data));
	}

	public function create_category()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Category | Create';
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'category/form', array('data' => $this->data));
	}

	public function list_category()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs']);
		$this->data['title']		= 'Category | List';
		$this->data['category']		= Category::all();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/setting/list_category', array('data' => $this->data));
	}

	public function create_subcategory()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Subcategory | Create';
		$this->data['category_list']= [' - Select - '] + Category::lists('name', 'id')->all();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'subcategory/form', array('data' => $this->data));
	}

	public function list_subcategory()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs']);
		$this->data['title']		= 'Subcategory | List';
		$this->data['category']		= Category::all();
		$this->data['subcategory']		= Subcategory::all();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/setting/list_subcategory', array('data' => $this->data));
	}

	// ========== VIEW ===========

	public function view_category($id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Category | View';
		if(Category::find($id)){
			$this->data['category']		= Category::find($id);
		}else{
			return redirect('master/category/list');
		}
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'category/view', array('data' => $this->data));
	}

	public function view_subcategory($id)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Subcategory | View';
		if(Subcategory::find($id)){
			$this->data['category']		= Subcategory::find($id);
		}else{
			return redirect('master/subcategory/list');
		}
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'subcategory/view', array('data' => $this->data));
	}

	// ========== CREATE ============

	public function add_category(Request $request)
	{
		$rules = array(
			'name' => 'required',
			'slug' => 'required', 
			);
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
	    	$category = New Category;
	    	$category->name =  $request->input('name');
	    	$category->slug =  $request->input('slug');
	    	$category->save();
	    	return redirect('master/category/list');
		}else{
			return redirect('master/category/create')->with('error', 'Terdapat form kosong');
		}
	}

	public function add_subcategory(Request $request)
	{
		$rules = array(
			'subname' => 'required',
			'category' => 'required',
			'slug' => 'required', 
			);
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
	    	$category = New Subcategory;
	    	$category->subname = $request->input('subname');
	    	$category->category_id = $request->input('category');
	    	$category->slug = $request->input('slug');
	    	$category->properties = $request->input('properties');
	    	$category->save();
	    	return redirect('master/subcategory/list');
		}else{
			return redirect('master/subcategory/create')->with('error', 'Terdapat form kosong');
		}
	}

	// ========== EDIT ============

	public function edit_category($id, Request $request)
	{
		if(Category::find($id)){
			if($request->all()){
				$rules = array(
					'name' => 'required',
					'slug' => 'required', 
					);
				$validator = Validator::make($request->all(), $rules);
				if (!$validator->fails()) {
					$category = Category::find($id);
					$category->name = $request->input('name');
					$category->slug = $request->input('slug');

					if($category->save()){
						return redirect('master/category/list');
					}
				}else{
					return redirect('master/category/edit/'.$id)->with('error', 'Terdapat form kosong');
				}
			}else{
				$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
				$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
				$this->data['title']		= 'Category | Edit';
				$this->data['category']		= Category::find($id);
			    return view('admin_layout')->with('data', $this->data)
										  ->nest('content', 'category/form', array('data' => $this->data));
			}
		}else{
			return redirect('master/category/list');
		}
	}

	public function edit_subcategory($id, Request $request)
	{
		if(Subcategory::find($id)){
			if($request->all()){
				$rules = array(
					'subname' => 'required',
					'category' => 'required',
					'slug' => 'required', 
					);
				$validator = Validator::make($request->all(), $rules);
				if (!$validator->fails()) {
					$category = Subcategory::find($id);
					$category->subname = $request->input('subname');
			    	$category->category_id = $request->input('category');
			    	$category->slug = $request->input('slug');
			    	$category->properties = $request->input('properties');

					if($category->save()){
						return redirect('master/subcategory/list');
					}
				}else{
					return redirect('master/subcategory/edit/'.$id)->with('error', 'Terdapat form kosong');
				}
			}else{
				$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
				$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
				$this->data['title']		= 'Subcategory | Edit';
				$this->data['category']		= Subcategory::find($id);
				$this->data['category_list']= [' - Select - '] + Category::lists('name', 'id')->all();
			    return view('admin_layout')->with('data', $this->data)
										  ->nest('content', 'subcategory/form', array('data' => $this->data));
			}
		}else{
			return redirect('master/subcategory/list');
		}
	}

	// ========== DELETE ============

	public function delete_category($id)
	{
		Category::find($id)->delete();

		return redirect('master/category/list');
	}

	public function delete_subcategory($id)
	{
		Subcategory::find($id)->delete();

		return redirect('master/subcategory/list');
	}
	
}
