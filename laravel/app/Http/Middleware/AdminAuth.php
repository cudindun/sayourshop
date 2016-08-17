<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
	    if(!Sentinel::guest()) {
	        if(Sentinel::getUser()->status == "1"){
	    		return $next($request);
		    }else{
		    	return redirect('error');
		    }
	    }
	    return redirect('master/login');
    }
}