<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Contracts\Routing\UrlGenerator;

class SetLocale
{
    private $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function handle($request, Closure $next)
    {
        $this->url->defaults([
            'locale' => $request->segment(1) ?? config('app.locale'),
        ]);
        app()->setLocale($request->segment(1));

        return $next($request);
    }
}
