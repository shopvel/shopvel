<?php
namespace Shopvel\Admin;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    protected $namespace = 'Shopvel\Admin';

    /**
     * @param Router $router
     */
    public function boot(Router $router)
    {
        parent::boot($router);
    }

    /**
     * @param Router $router
     */
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