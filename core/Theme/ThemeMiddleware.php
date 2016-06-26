<?php
namespace Shopvel\Theme;

use Closure;

class ThemeMiddleware
{
    public function handle($request, Closure $next, $themeName)
    {
        \Theme::set($themeName);
        return $next($request);
    }
}