<?php
namespace Shopvel\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Router;

class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $url = parse_url(url()->current());
        if (isset($url['path']) && substr($url['path'],1,7) == 'backend') {
            $this->app->register(\Shopvel\ServiceProvider\BackendServiceProvider::class);
        } else {
            $this->app->register(\Shopvel\ServiceProvider\FrontendServiceProvider::class);
        }

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        /*
         * Theme Setup
         */
        $loader->alias('Theme', \Shopvel\Facade\ThemeFacade::class);
        $this->app->singleton('shopvel.theme', function(){
            return new \Shopvel\Component\Theme\Themes();
        });

        $this->app->singleton('view.finder', function($app) {
            $paths = $app['config']['view.paths'];
            return new \Shopvel\Component\Theme\ThemeViewFinder($app['files'], $paths, null, $app['shopvel.theme']);
        });

        $theme = $this->app->make('shopvel.theme');
        $theme->set(Config::get('theme.name'));

        /*
         * Language Setup
         */
        $loader->alias('Language', \Shopvel\Facade\LanguageFacade::class);
        $this->app->singleton('shopvel.language', function(){
            return new \Shopvel\Component\Language\Language();
        });
    }

    public function boot(Router $router)
    {
        $router->middleware('theme', \Shopvel\Middleware\ThemeMiddleware::class);
        $router->middleware('lang', \Shopvel\Middleware\LanguageMiddleware::class);
    }
}