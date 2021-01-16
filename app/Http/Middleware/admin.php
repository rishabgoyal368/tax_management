<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard('admin')->check()) {
        //     return $next($request);
        // }
        // return redirect('login');
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }
        return $next($request);
    }
}
