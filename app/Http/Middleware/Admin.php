<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
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
//        var_dump( request()->user()->isAdmin());

//        if (request()->user() && request()->user()->isAdmin())
//        {
//            return $next($request);
//        }
//
//        return redirect('/');


        if(Auth::check()){
            $user=Auth::user();
            if($user->isAdmin()){
                session(['name'=>$user->name]);
                return $next($request);
            }
        }
        return redirect('/');

    }
}
