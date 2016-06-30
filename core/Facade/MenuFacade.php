<?php
namespace Shopvel\Facade;

use Illuminate\Support\Facades\Facade;

class MenuFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'shopvel.menu';
    }
}