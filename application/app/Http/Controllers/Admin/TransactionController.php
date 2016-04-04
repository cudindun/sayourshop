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

class TransactionController extends Controller
{
    public function order()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'icheck', 'morris_chart', 'jvectormap', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'morris_chart_js', 'sparkline', 'jvectormap_js', 'jvectormap_world_js', 'knob', 'dataTables_js']);
		$this->data['title']		= 'SayourShop | Rekening';
		$this->data['bank_account'] = Option::where('meta_key','bank_account')->first();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/transaction/order', array('data' => $this->data));
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
}