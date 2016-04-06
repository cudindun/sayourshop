<?php

namespace App\Http\Middleware;

use Closure, Sentinel;

class LoggedIn
{
	public function handle($request, Closure $next)
    {
    	if(!Sentinel::guest()) {
	        if(Sentinel::getUser()->status == "1"){
	    		return redirect('master');
		    }else{
		    	return redirect('error');
		    }
	    }
    }
}