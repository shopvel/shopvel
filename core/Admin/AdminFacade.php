<?php
namespace Shopvel\Admin;

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