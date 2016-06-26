<?php
namespace Shopvel\Theme;

use Illuminate\Support\Facades\Facade;

class ThemeFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'shopvel.theme'; }
}