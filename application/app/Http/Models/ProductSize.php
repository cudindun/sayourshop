<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class ProductSize extends Model {

    protected $table = 'product_size';
    
    public function getJson($input)
	{
		$table 	= 'product_size as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'size', 'new_name' => 'a.size'],
			['old_name' => 'product_id', 'new_name' => 'a.product_id'],
			['old_name' => 'quantity', 'new_name' => 'a.quantity'],
			['old_name' => 'sold', 'new_name' => 'a.sold']
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

    public function product()
    {
        return $this->belongsTo('App\Http\Models\Product');
    }
}