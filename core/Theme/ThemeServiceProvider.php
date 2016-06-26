<?php
namespace Shopvel\Theme;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Shopvel\Theme\Themes;
use Shopvel\Theme\ThemeViewFinder;

class ThemeServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->singleton('shopvel.theme', function(){
            return new Themes();
        });

        $this->app->singleton('view.finder', function($app) {
            $paths = $app['config']['view.paths'];
            return new ThemeViewFinder($app['files'], $paths, null, $app['shopvel.theme']);
        });

        $theme = $this->app->make('shopvel.theme');
        $theme->set(Config::get('theme.name'));
    }
}