<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('locale');

        if (!$locale) {
            $locale = $request->user()?->locale ?? config('app.locale');
        }

        if (!in_array($locale, ['en', 'ar'], true)) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        if ($request->user() && $request->user()->locale !== $locale) {
            $request->user()->forceFill(['locale' => $locale])->save();
        }

        return $next($request);
    }
}
