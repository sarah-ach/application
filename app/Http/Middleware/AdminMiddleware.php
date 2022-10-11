<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            /
            if(Auth::user()->role=='admin')
            {
                return $next($request);
            }
            else{
                return redirect('/wires')->with('message','Access Denied as you are not admin');
            }
            
        }else{
                return redirect('/login')->with('message','Login to access the website info'); 
            }
        
        
        return $next($request);
    }
}
