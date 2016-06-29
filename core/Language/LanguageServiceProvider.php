<?php
namespace Shopvel\Language;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Shopvel\Theme\Themes;
use Shopvel\Theme\ThemeViewFinder;

class LanguageServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->singleton('shopvel.language', function(){
            return new Language();
        });
    }
}