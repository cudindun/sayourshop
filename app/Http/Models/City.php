<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'city';
    
    public function getJson($input)
	{
		$table 	= 'city as a';
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

	public function district()
    {
        return $this->hasMany('App\Http\Models\District');        
    }

    public function province()
    {
        return $this->belongsTo('App\Http\Models\Province');        
    }

}