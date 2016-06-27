<?php
namespace Shopvel\Theme;

use Closure;

class ThemeMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @param $themeName
     * @return mixed
     */
    public function handle($request, Closure $next, $themeName)
    {
        \Theme::set($themeName);
        return $next($request);
    }
}