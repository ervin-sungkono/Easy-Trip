<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isUser
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

            if(Auth::user()->role === 'member'){

                return $next($request);

            }else{
                return redirect()->route('home')->with('fail', 'Akses ditolak, mohon mengecek kredential anda');
            }

        }else{
            return redirect()->route('login')->with('fail', 'Mohon memasuki akun terlebih dahulu');
        }
    }
}
