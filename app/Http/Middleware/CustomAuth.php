<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;


class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {     

      $path = $request->path();
        if(!auth()->user() &&  $path !='login' ) {
        
         return redirect('/login')->with('status', 'login is required!');

        }
        return $next($request);
        
    }
}
