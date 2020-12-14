<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected function authenticated(){

    }
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }
        return redirect('/unauthorized-access');
    }
}
