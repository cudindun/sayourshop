<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use App\Http\Models\User;
use App\Http\Models\Category;
use App\Http\Models\Subcategory;
use App\Http\Models\Option;
use DB, Validator;

class SettingController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}
	
    public function bank_account_form()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'icheck', 'morris_chart', 'jvectormap', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'morris_chart_js', 'sparkline', 'jvectormap_js', 'jvectormap_world_js', 'knob', 'dataTables_js']);
		$this->data['title']		= 'SayourShop | Rekening';
		$this->data['bank_account'] = Option::where('meta_key','bank_account')->first();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/setting/bank_account', array('data' => $this->data));
	}

	public function add_bank_account(Request $request)
	{
		$rules = array(
			'bank_name' => 'required',
			'bank_account' => 'required',
			'account_name' => 'required' 
			);
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$bank_account = [
				'bank_name' => $request->bank_name,
				'bank_account' => $request->bank_account,
				'account_name' => $request->account_name,
				];
			if ($bank = Option::where('meta_key','bank_account')->first()) {
				$unserialize = unserialize($bank->meta_value);
				$sum_array = array_push($unserialize, $bank_account);
				$serialize = serialize($unserialize);
				$total = Option::where('meta_key','bank_account')->update(['meta_value' => $serialize]);
				return redirect('master/setting/bank_account')->with('success','Nomor Rekening berhasil ditambahkan');
			}else{
				$bank = new Option;
				$bank->meta_key = "bank_account";
				$bank->meta_value = serialize(array($bank_account));
				$bank->save();
				return redirect('master/setting/bank_account')->with('success','Nomor Rekening berhasil ditambahkan');
			}
		}else{
			return redirect('master/setting/bank_account')->with('failed','Silahkan isi sesuai form ang disediakan');
		}
	}

	public function del_bank_account($id)
	{
		$bank_account = Option::where('meta_key','bank_account')->first();
		$a = unserialize($bank_account->meta_value);
		unset($a[$id]);
		$reindex = array_values($a);
		$serialize = serialize($reindex);
		$update = Option::where('meta_key','bank_account')->update(['meta_value' => $serialize]);
		return redirect('master/setting/bank_account')->with('success','Nomor rekening berhasil dihapus');
	}

	public function create_category(Request $request)
	{
		$rules = array('category' => 'required');
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {	
			$value = strtolower($request->category);
			$db_cat = Category::where('name', $value)->first();
			if ($db_cat) {
				return redirect('master/setting/category/list')->with('failed','Maaf kategori telah tersedia');
			}else{
				$category = new Category;
				$category->name = $value;
				$category->slug = str_replace(" ", "-", $value);
				$category->save();
			    return redirect('master/setting/category/list')->with('success','Kategori baru berhasil ditambahkan');
			}
		}else{
			return redirect('master/setting/category/list')->with('failed','Silahkan isi Nama Kategori');
		}
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

	public function create_subcategory(Request $request)
	{
		$rules = array(
			'subcategory' => 'required');
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$value = strtolower($request->subcategory);
			$category = Category::where('id',$request->category)->first();
			$subcategory = Subcategory::where('category_id',$category->id)->where('subname',$value)->first();
			if($subcategory){
				return redirect('master/setting/subcategory/list')->with('failed','Maaf subkategori telah tersedia');
			}else{
				$subcategory = new Subcategory;
				$subcategory->subname = $value;
				$subcategory->slug = str_replace(" ", "-", $value);
				$subcategory->category_id = $category->id;
				$subcategory->save();
			    return redirect('master/setting/subcategory/list')->with('success','Subkategori baru berhasil ditambahkan');
			}
		}else{
			return redirect('master/setting/subcategory/list')->with('failed','Silahkan isi nama subkategori');
		}
	}

	public function list_subcategory()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css','ionicons']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery-adm', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs','raphael','moment']);
		$this->data['title']		= 'Subcategory | List';
		$this->data['category']		= Category::get();
		$this->data['subcategory']	= Subcategory::all();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/setting/list_subcategory', array('data' => $this->data));
	}

	public function category_content(Request $request)
	{
		$this->data['subcategory'] = Subcategory::where('category_id', $request->id)->get();
		return view('admin/setting/subcategory_content')->with('data', $this->data);
	}
}
