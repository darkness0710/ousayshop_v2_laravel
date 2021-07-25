<?php

namespace App\Http\Middleware\Admin;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminAuth extends Middleware
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
    	if (!Auth::guard('admin')->user()) {
    		return redirect()->route('admin.auth.login.get');
    	}

    	return $next($request);
    }
}
