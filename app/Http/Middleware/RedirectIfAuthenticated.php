<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
         //$guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guards)->check()) {
                $role = Auth::user()->role; 
            
                switch ($role) {
                  case 'admin':
                     return redirect('/admin/dashboard');
                     break;
                  case 'operateur':
                     return redirect('/operateur/dashboard');
                     break; 
            
                  default:
                     return redirect('/wires'); 
                     break;
                }
              }
        }

        return $next($request); 

    }
}
