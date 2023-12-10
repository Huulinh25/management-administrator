<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MemberNotLoginAuthetication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if( !Auth::check() ){
            return $next($request);
        }else{
            return redirect()->back()->withErrors('Thao tác không đúng quy trình! Xin thử lại!');
        }
    }
}
