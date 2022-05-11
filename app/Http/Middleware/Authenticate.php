<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    { //i amnot loggedin(guest) and  try access to the routes belong to Auth then (i will go to any router belong to guest middleware)(else section) i can't access to the routes belong to auth that is error on the browser
        if (! $request->expectsJson()) {
            //Auth::guard(Auth::getDefaultDriver())->check()
            //Auth::setDefaultDriver('admin');
            //  dd('user '.(Auth::guard('web')->check()?'loggedin':'not loggedin'),
            //  'admin '.(Auth::guard('admin')->check()?'loggedin':'not loggedin'),
            //  'Default Driver Is '.Auth::getDefaultDriver());
            if($request->routeIs('admin.info*'))
                return route('admin.hello');
                //return route('user.home');//error because there isnt guard for this route it will not enable RedirectifAuthenticated
            elseif($request->routeIs('user.info*'))
                return route('user.hello');
                //return route('user.login');
                //return route('user.home');//error because there isnt guard for this route it will not enable RedirectifAuthenticated


            elseif($request->routeIs('admin.home*'))
                return route('admin.login');
            elseif($request->routeIs('user.home*'))
                return route('user.login');

                //any thing else will redirect to th main login page
        }
        dd("999999999999999999999999999");
    }
}
