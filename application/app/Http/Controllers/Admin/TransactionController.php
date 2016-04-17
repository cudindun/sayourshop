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
use App\Http\Models\Order;
use App\Http\Models\PaymentConfirmation;
use DB, Validator;

class TransactionController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}
	
	public function payment_list()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs']);
		$this->data['title']		= 'SayourShop | Pembayaran';
		$this->data['payment']		= PaymentConfirmation::orderBy('created_at','desc')->get();
	    return view('admin_layout')->with('data', $this->data)
								  ->nest('content', 'admin/transaction/payment', array('data' => $this->data));
	}

    public function order()
	{
		$this->data['css_assets'] 	= Assets::load('css', ['admin_bootstrap', 'admin_css', 'font-awesome', 'skins', 'dataTables_css']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery', 'admin_js', 'admin_bootstrap-js', 'slimscroll', 'fastclick', 'dataTables_js', 'dataTables_bootsjs']);
		$this->data['title']		= 'SayourShop | Pemesanan';
		$this->data['bank_account'] = Option::where('meta_key','bank_account')->first();
		$this->data['order']		= Order::orderBy('created_at','desc')->get();
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

	public function payment(Request $request)
	{
		$order = Order::where('id', $request->payment)->first();
		$order->order_status = "Lunas";
		$order->save();
		return redirect('master/transaction/pembayaran');
	}

	public function insert_shipping(Request $request)
	{
		$order = Order::where('id', $request->orderid)->first();
		$order->no_resi = $request->resi;
		$order->save();
	}

	public function send(Request $request)
	{
		$order = Order::where('id', $request->orderid)->first();
		$product = $order->order_detail;

		$order->order_status = "Dikirim";
		$order->save();
	}
}
