<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class MemberAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        
        if( Auth::check() && Auth::user()->level == 0 ){
            return $next($request);
        }else{
            return redirect('/member-login')->with('pleaseLogin','Please login to use this function');
        }
    }
}
