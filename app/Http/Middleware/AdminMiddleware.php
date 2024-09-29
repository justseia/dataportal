<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        if (Auth::guard('admin')->check() && Route::is('admin.auth.index')) {
            return redirect()->route('admin.dashboard.index');
        }

        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        if (Route::is('admin.auth.index') || Route::is('admin.auth.login')) {
            return $next($request);
        }

        return redirect()->route('admin.auth.login')->withErrors('У вас нет необходимых разрешений для доступа к этой странице');
    }
}
