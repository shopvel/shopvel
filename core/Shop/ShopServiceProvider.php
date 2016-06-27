<?php
namespace Shopvel\Shop;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    protected $namespace = 'Shopvel\Shop';

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
            'namespace' => $this->namespace, 'middleware' => 'web'
        ], function ($router) {

            $router->get('/', function() {
                return 'Hello [Shop]';
            });

        });
    }
}