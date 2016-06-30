<?php
namespace Shopvel;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \Shopvel\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Shopvel\Middleware\VerifyCsrfToken::class,
        ],
        'api' => [
            'throttle:60,1',
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \Shopvel\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'guest' => \Shopvel\Middleware\RedirectIfAuthenticated::class,
    ];
}