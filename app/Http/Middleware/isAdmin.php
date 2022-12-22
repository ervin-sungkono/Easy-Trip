<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        if(Auth::check()){

            if(Auth::user()->role === 'admin'){

                return $next($request);

            }else{
                return redirect()->route('home')->with('fail', 'Not authorized, please check your credentials');
            }

        }else{
            return redirect()->route('login')->with('fail', 'Please login first');
        }
    }
}
