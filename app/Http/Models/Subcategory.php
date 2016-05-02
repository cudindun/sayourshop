<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {

    protected $table = 'subcategory';
    
    public function getJson($input)
	{
		$table 	= 'subcategory as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'subname', 'new_name' => 'a.subname'],
			['old_name' => 'slug', 'new_name' => 'a.slug'],
			['old_name' => 'properties', 'new_name' => 'a.properties'],
			['old_name' => 'total_product', 'new_name' => 'a.total_product']
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

	public function category()
    {
        return $this->belongsTo('App\Http\Models\Category');        
    }

    public function product()
    {
        return $this->hasMany('App\Http\Models\Product');        
    }

}