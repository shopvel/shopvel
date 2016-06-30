<?php
namespace Shopvel\Facade;

use Illuminate\Support\Facades\Facade;

class AdminFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'shopvel.admin';
    }
}