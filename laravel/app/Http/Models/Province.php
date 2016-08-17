<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Province extends Model {

    protected $table = 'province';
    
    public function getJson($input)
	{
		$table 	= 'province as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'name', 'new_name' => 'a.name']
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

    public function City()
    {
        return $this->hasMany('App\Http\Models\City');        
    }

    public function order()
    {
        return $this->hasMany('App\Http\Models\Order');        
    }

}