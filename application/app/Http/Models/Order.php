<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'order';
    
    public function getJson($input)
	{
		$table 	= 'order as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'no_invoice', 'new_name' => 'a.no_invoice'],
			['old_name' => 'progress', 'new_name' => 'a.progress'],
			['old_name' => 'total_price', 'new_name' => 'a.total_price'],
            ['old_name' => 'order_name', 'new_name' => 'a.order_name'],
            ['old_name' => 'order_phone', 'new_name' => 'a.order_phone'],
            ['old_name' => 'order_address', 'new_name' => 'a.order_address'],
            ['old_name' => 'total_weight', 'new_name' => 'a.total_weight'],
            ['old_name' => 'discount_code', 'new_name' => 'a.discount_code'],
            ['old_name' => 'total_discount', 'new_name' => 'a.total_discount'],
            ['old_name' => 'shipping_price', 'new_name' => 'a.shipping_price'],
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

	public function order_detail()
    {
        return $this->hasMany('App\Http\Models\OrderDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }
}