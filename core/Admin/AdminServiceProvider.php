<?php
namespace Shopvel\Admin;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    protected $namespace = 'Shopvel\Admin';

    public function boot(Router $router)
    {
        parent::boot($router);
    }

    public function map(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'prefix' => 'admin', 'middleware' => ['theme:admin', 'web']
        ], function ($router) {

            $router->get('/', function() {
                return 'Hello [Admin]';
            });

        });
    }
}