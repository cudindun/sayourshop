<?php namespace App\Http\Libraries;
use Sentry;

/**
* 
*/
class GetUser
{

	public static function thisUser()
	{
		$user = \App\Http\Models\User::find(Sentry::getUser()->id);
		return $user;
	}
}
	