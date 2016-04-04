<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

    protected $table = 'users_meta';
    
    public function getJson($input)
	{
		$table 	= 'users_meta as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'user_id', 'new_name' => 'a.user_id'],
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

	public function province()
    {
        return $this->hasMany('App\Http\Models\Province');        
    }
}