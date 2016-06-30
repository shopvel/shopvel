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
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        /*
         * Add Component Admin
         */
        $loader->alias('Admin', \Shopvel\Facade\AdminFacade::class);
        $this->app->singleton('shopvel.admin', function(){
            return new \Shopvel\Component\Admin\Admin();
        });

        /*
         * Add Component Menu
         */
        $loader->alias('Menu', \Shopvel\Facade\MenuFacade::class);
        $this->app->singleton('shopvel.menu', function(){
            return new \Shopvel\Component\Menu\Menu();
        });
    }

    public function boot(Router $router)
    {
        $router->middleware('configure', \Shopvel\Middleware\ConfigureMiddleware::class);

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
                'lang',
                'configure:backend'
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