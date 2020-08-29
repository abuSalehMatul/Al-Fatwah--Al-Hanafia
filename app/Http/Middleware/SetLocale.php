<?php

namespace App\Http\Middleware;

use Closure;

// this middleware is for setting the app locale if not set by url & default route parameter is set in the app service provider.
class SetLocale
{
    public function handle($request, Closure $next)
    {
        $APP_LOCALE = $request->segment(1) ?? config('app.locale');

        app()->setLocale($APP_LOCALE);
        
        view()->share('APP_LOCALE', $APP_LOCALE);

        $request->route()->forgetParameter('locale');

        return $next($request);
    }
}
