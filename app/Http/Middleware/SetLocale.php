<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    private $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function handle($request, Closure $next)
    {
        // $this->url->defaults([
        //     'locale' => ,
        // ]);
        $APP_LOCALE = $request->segment(1) ?? config('app.locale');

        app()->setLocale($APP_LOCALE);

        $this->url->defaults(['locale' => $APP_LOCALE]);

        
        view()->share('APP_LOCALE', $APP_LOCALE);

        return $next($request);
    }
}
