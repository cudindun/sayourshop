<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {

    protected $table = 'order_detail';
    
    public function getJson($input)
	{
		$table 	= 'order_detail as a';
		$select = 'a.*';
		
		$replace_field 	= [
			['old_name' => 'order_id', 'new_name' => 'a.order_id'],
            ['old_name' => 'quantity', 'new_name' => 'a.quantity'],
			['old_name' => 'total_price', 'new_name' => 'a.total_price'],
			['old_name' => 'total_weight', 'new_name' => 'a.total_weight'],
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

	public function order()
    {
        return $this->belongsTo('App\Http\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Http\Models\Product');
    }
}