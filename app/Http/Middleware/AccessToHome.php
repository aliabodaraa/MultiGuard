<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccessToHome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {//dd($guard);
        //dd($request->user()->is)
        //dd(Auth::getDefaultDriver());
        //without knowing guard !! Although i try to pass $guards array but there is any change occurented
        //if(Auth::getDefaultDriver() =='admin')
        //    return abort(403);//when user try to access to home admin page he won't access

        //when admin try to access to home admin page he will access
        return $next($request);
    }
}
