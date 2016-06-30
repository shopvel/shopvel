<?php
namespace Shopvel\ServiceProvider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class FrontendServiceProvider extends ServiceProvider
{
    public function register()
    {
        define('SHOPVEL_VIEW', 'frontend');
    }
}