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
    {//there is two possibilities to comes to this class Either i am logeedin(auth) and i try to access to the routes belong to Guest
                                                         //Or i am not loggedin(guest)(section else) and  try access to the routes belong to Auth i will became in else section in this class redirected from Authenticate.php
        $guards = empty($guards) ? [null] : $guards;
        print_r($guards);
        foreach ($guards as $guard) {
            //echo "<h1 style='padding-top:100px ;color:red;'>".$guard."-".(!empty(Auth::guard($guard)->check())?"checked":"Non-Checked")."</h1>";
            //dd("guest");
            if (Auth::guard($guard)->check()) {
                if($guard === 'admin' && $request->routeIs('admin.login'))
                    return redirect()->route('admin.home');//here will trigger middleware access
                if($guard === 'web' && $request->routeIs('user.login'))
                    return redirect()->route('user.home');
            }else{
                if($guard === 'web' && $request->routeIs('user.hello') )//user.hello absoulotely comes from Authenticate.php user.home
                   return redirect()->route('user.login');//print_r("hiiii -".Auth::user()."-you are not login and try to access to user/info ,on demand we redirect to user.hello");
                if($guard === 'admin' && $request->routeIs('admin.hello') )//user.hello absoulotely comes from Authenticate.php user.home
                   print_r("hiiii Aloshe maybe you are demand admin/info");
            }
        return $next($request);
        }
    }
}
