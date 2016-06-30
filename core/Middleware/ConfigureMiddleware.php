<?php
namespace Shopvel\Middleware;

use Closure;

class ConfigureMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @param $view
     * @return mixed
     */
    public function handle($request, Closure $next, $view)
    {
        if ($view == 'backend') {
            \Shopvel\Backend\Configure::config();
            \Shopvel\Backend\Configure::menu();
        }
        return $next($request);
    }
}