<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->user()->role == $role) {
            return $next($request);
        }else{
            if (auth()->user()->role == 'admin') {
                return redirect(RouteServiceProvider::ADMIN);
            }elseif(auth()->user()->role == 'staff'){
                return redirect(RouteServiceProvider::STAFF);
            }
        }
        return redirect(RouteServiceProvider::HOME);
    }
}