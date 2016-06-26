<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'category';
    
    public function getJson($input)
	{
		$table 	= 'category as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'name', 'new_name' => 'a.name'],
			['old_name' => 'total_product', 'new_name' => 'a.total_product'],
			['old_name' => 'slug', 'new_name' => 'a.slug']
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

	public function subcategory()
    {
        return $this->hasMany('App\Http\Models\Subcategory');        
    }

    public function product()
    {
        return $this->hasMany('App\Http\Models\Product');        
    }
}