<?php
namespace Shopvel\ServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Router;

class BackendServiceProvider extends ServiceProvider
{
    protected $namespace = 'Shopvel\Backend\Controller';

    public function register()
    {
        define('SHOPVEL_VIEW', 'backend');

        /*
         * Add singleton classes
         */
        $this->app->singleton('shopvel.admin', function(){
            return new \Shopvel\Component\Admin\Admin();
        });

        /*
         * Create aliases
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Admin', \Shopvel\Facade\AdminFacade::class);
    }

    public function boot(Router $router)
    {
        \Config::set('mail.from', [
            'address' => env('MAIL_FROM_ADDRESS', null),
            'name' => 'Shopvel eCommerce'
        ]);

        parent::boot($router);
        $this->map($router);
    }

    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
            'prefix' => 'backend',
            'middleware' => [
                'web',
                'theme:backend',
                'lang'
            ]
        ], function (Router $router) {

            $router->get('/', function(){
                return redirect(url('backend/c/dashboard'));
            });

            $router->group(['middleware' => 'guest'], function(Router $router) {
                $router->get('login', 'Auth\AuthController@getLogin');
                $router->post('login', 'Auth\AuthController@postLogin');
                $router->get('forgot-password', 'Auth\PasswordController@getEmail');
                $router->post('forgot-password', 'Auth\PasswordController@postEmail');
                $router->get('reset-password/{code}', 'Auth\PasswordController@getReset');
                $router->post('reset-password', 'Auth\PasswordController@postReset');
            });

            $router->group(['middleware' => 'auth:admin'], function(Router $router) {

                $router->get('logout', function(){
                    \Auth::logout(); \Session::flush(); return redirect('/backend/login');
                });

                $router->any('c/{controller}', function(Request $request, $controller) {
                    return app()->call($this->namespace . '\\' . ucfirst($controller).'Controller@' .
                        ucfirst(strtolower($request->method())) . 'Index');
                });

                $router->any('c/{controller}/a/{action}', function(Request $request, $controller, $action) {
                    return app()->call($this->namespace . '\\' . ucfirst($controller).'Controller@' .
                        ucfirst(strtolower($request->method())) . ucfirst(strtolower($action)));
                });

            });

        });
    }
}