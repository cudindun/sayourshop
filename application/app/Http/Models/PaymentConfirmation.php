<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model {

    protected $table = 'payment_confirmation';
    
    public function getJson($input)
	{
		$table 	= 'payment_confirmation as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'no_invoice', 'new_name' => 'a.no_invoice'],
			['old_name' => 'account_name', 'new_name' => 'a.account_name'],
			['old_name' => 'bank_account', 'new_name' => 'a.bank_account'],
            ['old_name' => 'bank_name', 'new_name' => 'a.bank_name'],
            ['old_name' => 'admin_account', 'new_name' => 'a.admin_account'],
            ['old_name' => 'total_transfer', 'new_name' => 'a.total_transfer'],
            ['old_name' => 'transfer_date', 'new_name' => 'a.transfer_date']
		];

		$param = [
			'input' 		=> $input,
			'select' 		=> $select,
			'table' 		=> $table,
			'replace_field' => $replace_field
		];

        $lionade = new Lionade;
        $data = $lionade->lionade_query($param, function($data) {
            return $data;
        });
	}
}