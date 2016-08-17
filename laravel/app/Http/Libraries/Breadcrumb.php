<?php namespace App\Http\Libraries;

class Breadcrumb {

	public static function load($choose)
	{
		$data = [];
		$breadcrumb = \Config::get('breadcrumb');
		foreach ($choose as $key) {
			$data[] = $breadcrumb[$key];	
		}
		return $data;
	}
}
