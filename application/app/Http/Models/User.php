<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'users';
    
    public function getJson($input)
	{
		$table 	= 'users as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'email', 'new_name' => 'a.email'],
			['old_name' => 'first_name', 'new_name' => 'a.first_name'],
			['old_name' => 'last_name', 'new_name' => 'a.last_name'],
			['old_name' => 'phone', 'new_name' => 'a.phone'],
            ['old_name' => 'status', 'new_name' => 'a.status']
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

	public function activation()
    {
        return $this->hasOne('App\Http\Models\Shop');
    }
}