<?php
namespace Shopvel\Admin;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    protected $namespace = 'Shopvel\Admin';

    public function register()
    {
        $this->app->singleton('shopvel.admin', function(){
            return new Admin();
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Admin', \Shopvel\Admin\AdminFacade::class);
    }

    /**
     * @param Router $router
     */
    public function boot(Router $router)
    {
        \Config::set('mail.from', ['address' => env('MAIL_FROM_ADDRESS', null), 'name' => 'Shopvel eCommerce']);
        parent::boot($router);
    }

    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'prefix' => 'admin', 'middleware' => ['theme:admin', 'web', 'language']
        ], function ($router) {

            $router->group(['middleware' => 'guest'], function($router) {
                $router->get('login', 'Auth\AuthController@getLogin');
                $router->post('login', 'Auth\AuthController@postLogin');
                $router->get('forgot-password', 'Auth\PasswordController@getEmail');
                $router->post('forgot-password', 'Auth\PasswordController@postEmail');
                $router->get('reset-password/{code}', 'Auth\PasswordController@getReset');
                $router->post('reset-password', 'Auth\PasswordController@postReset');
            });

            $router->group(['middleware' => 'auth:admin'], function($router) {
                $router->get('logout', function(){
                    \Auth::logout(); \Session::flush(); return redirect('/admin/login');
                });
                $router->get('articles', 'Article\Article@getAll');
                $router->get('article/add', 'Article\Article@getAdd');
                $router->get('/', function() {
                    return view('master');
                });
            });

        });
    }
}