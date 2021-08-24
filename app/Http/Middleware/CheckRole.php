<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(in_array($request->user()->roles, $roles)) {
            return $next($request);
        } else {
            return redirect()->back();
        }

        // if (Auth::check() && Auth::user()->roles == 'ADMIN') {
        //     return $next($request);
        // } elseif (Auth::check() && Auth::user()->roles == 'KEPSEK') {
        //     return $next($request);
        // } elseif (Auth::check() && Auth::user()->roles == 'GURU') {
        //     return redirect()->route('home.teacher');
        // } elseif (Auth::check() && Auth::user()->roles == 'SISWA') {
        //     return redirect()->route('home.siswa');
        // } else {
        //     return redirect()->back();
        // }
    }
}
