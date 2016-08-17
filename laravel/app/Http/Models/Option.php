<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Option extends Model {

    protected $table = 'option';
    
    public function getJson($input)
	{
		$table 	= 'option as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'meta_key', 'new_name' => 'a.meta_key'],
			['old_name' => 'meta_value', 'new_name' => 'a.meta_value']
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