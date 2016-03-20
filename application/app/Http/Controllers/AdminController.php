<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\User;
use App\Http\Models\Category;
use App\Http\Models\Subcategory;
use DB;

class AdminController extends Controller
{

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

	public function create_category()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Category | Create';
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'category/create', array('data' => $this->data));
	}

	public function create_subcategory()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'dashboard', 'admin_bootstrap-js', 'slimscroll', 'fastclick']);
		$this->data['title']		= 'Subcategory | Create';
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'subcategory/create', array('data' => $this->data));
	}
	
}
