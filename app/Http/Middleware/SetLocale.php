<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
{

    private $locales = ['en', 'es'];
    public function handle($request, Closure $next)
    {
        \App::setLocale(session('applocale') ?? 'en');

        return $next($request);
    }
}
