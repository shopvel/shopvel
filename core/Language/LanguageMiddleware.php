<?php
namespace Shopvel\Language;

use Closure;

class LanguageMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->get('lang')) {
            \Language::set($request->get('lang'));
        }

        app()->setLocale(\Language::current());

        return $next($request);
    }
}