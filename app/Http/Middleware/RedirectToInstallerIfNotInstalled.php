<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToInstallerIfNotInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (env('APP_INSTALLED') == false && ! $request->is('install/*')) {
//            return redirect()->route('installation');
//        }

        return $next($request);
    }
}
