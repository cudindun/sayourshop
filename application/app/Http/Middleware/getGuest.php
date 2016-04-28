<?php

namespace App\Http\Middleware;

use Closure, Sentinel;
use App\Http\Models\Guest;

class getGuest
{
    public function handle($request, Closure $next)
    {
	    $guest = new Guest;
		$ip = $request->ip();
		$check_guest = Guest::where('ip_address', $ip)->first();

		if(!$check_guest->ip_address == $ip){
			$guest->ip_address = $ip;
			$guest->save();
		}

		return $next($request);
		//return var_dump($check_guest);
    }
}