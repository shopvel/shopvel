<?php
namespace Shopvel\Facade;

use Illuminate\Support\Facades\Facade;

class ThemeFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'shopvel.theme'; }
}