<?php
namespace Shopvel\Facade;

use Illuminate\Support\Facades\Facade;

class LanguageFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() { return 'shopvel.language'; }
}