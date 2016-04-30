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
		$check_guest = Guest::where('ip_address', $ip)->count();

		if($check_guest == 0){
			$guest->ip_address = $ip;
			$guest->save();
		}

		return $next($request);
		//return var_dump($check_guest);
    }
}