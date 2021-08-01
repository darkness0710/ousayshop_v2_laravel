<?php

namespace App\Http\Middleware\Client;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUserAuth extends Middleware
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
    	if (!Auth::guard('web')->user()) {
    		return redirect()->route('client.home.index');
    	}

    	return $next($request);
    }
}
