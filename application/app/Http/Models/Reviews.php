<?php namespace App\Http\Models;

use App\Http\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Reviews extends Model {

    protected $table = 'reviews';

    public function user()
    {
        return $this->belongsTo('App\Http\Models\User');
    }

    public function product()
    {
    	return $this->hasMany('App\Http\Models\Product');
    }

}
