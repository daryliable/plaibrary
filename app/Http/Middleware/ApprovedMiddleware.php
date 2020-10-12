<?php

namespace App\Http\Middleware;

use Closure;

class ApprovedMiddleware
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
        if(auth()->check()){
            if(!auth()->user()->approved){
                auth()->logout();
                
                return redirect()->route('error.login');
            }       
        }
        return $next($request);
    }
}
