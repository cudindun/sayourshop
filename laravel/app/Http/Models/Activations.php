<?php namespace App\Http\Models;

use DB, Illuminate\Database\Eloquent\Model;

class Activations extends Model {

    protected $table = 'activations';
    
    public function getJson($input)
	{
		$table 	= 'activations as a';
		$select = 'a.*';
		
		$replace_field 	= [
			['old_name' => 'code', 'new_name' => 'a.code'],
			['old_name' => 'completed', 'new_name' => 'a.completed']
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

	public function user()
    {
        return $this->hasOne('App\Http\Models\User');
    }
}