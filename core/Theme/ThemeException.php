<?php
namespace Shopvel\Theme;

use Exception;

class ThemeException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        $message = $message . ", current Theme: [" . \Theme::get() . "]";
        parent::__construct($message, $code, $previous);
    }
}