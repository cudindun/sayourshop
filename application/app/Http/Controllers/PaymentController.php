<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;
use DB, Cart, Validator;
use App\Http\Models\Option;
use App\Http\Models\PaymentConfirmation;

class PaymentController extends HomeController
{
    public function payment_form(Request $request)
	{
		$this->data['css_assets'] 	= Assets::load('css', ['lib-bootstrap', 'style', 'font-awesome', 'font-awesome-min', 'color-schemes-core', 'color-schemes-turquoise', 'bootstrap-responsive','font-family','datepicker']);
		$this->data['js_assets'] 	= Assets::load('js', ['jquery','jquery-min','jquery-ui', 'bootstrap-min-lib', 'jquery-isotope', 'jquery-flexslider', 'jquery.elevatezoom', 'jquery-sharrre', 'imagesloaded', 'la_boutique', 'jquery-cookie','datepicker','datepicker-locales']);
		$this->data['title']		= 'Konfirmasi Pembayaran';
		$this->data['bank_account']	= Option::where('meta_key','bank_account')->first();
		$this->data['invoice'] = $request->payment;
	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'payment_confirmation', array('data' => $this->data));
	}

	public function payment(Request $request)
	{
		$rules = array(
			'no_invoice' => 'required',
			'account_name' => 'required',
			'bank_account' => 'required',
			'bank_name' => 'required',
			'admin_account' => 'required',
			'total_transfer' => 'required',
			'transfer_date' => 'required', 
			);
		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$payment = new PaymentConfirmation;
			$payment->no_invoice = $request->no_invoice;
			$payment->account_name = $request->account_name;
			$payment->bank_account = $request->bank_account;
			$payment->bank_name = $request->bank_name;
			$payment->admin_account = $request->admin_account;
			$payment->total_transfer = $request->total_transfer;
			$payment->transfer_date = $request->transfer_date;
			$payment->save();
			return redirect('pembayaran')->with('success','Konfirmasi berhasil .Kami akan mengecek pembayaran Anda');
		}else{
			return redirect('pembayaran')->with('failed','Silahkan isi form sesuai yang disediakan');
		}
	}
}
