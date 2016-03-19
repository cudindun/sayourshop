<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'product';
    
    public function getJson($input)
	{
		$table 	= 'product as a';
		$select = 'a.*';
		
		$replace_field 	= [
            ['old_name' => 'name', 'new_name' => 'a.name'],
			['old_name' => 'slug', 'new_name' => 'a.slug'],
			['old_name' => 'desc', 'new_name' => 'a.desc'],
			['old_name' => 'price', 'new_name' => 'a.price'],
			['old_name' => 'quantity', 'new_name' => 'a.quantity'],
			['old_name' => 'rating', 'new_name' => 'a.rating'],
			['old_name' => 'sold', 'new_name' => 'a.sold'],
			['old_name' => 'image', 'new_name' => 'a.image']
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

    public function subcategory()
    {
        return $this->belongsTo('App\Http\Models\Subcategory');        
    }
}