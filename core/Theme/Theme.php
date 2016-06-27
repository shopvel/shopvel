<?php
namespace Shopvel\Theme;

class Theme
{
    public $name;
    public $assets;
    public $views;

    /**
     * Theme constructor.
     * @param $theme
     * @param null $assets
     * @param null $views
     */
    public function __construct($theme, $assets = null, $views = null)
    {
        $this->name = $theme;
        $this->assets = $assets === null ? $theme : $assets;
        $this->views = $views === null ? $theme : $views;
    }

    /**
     * @param $url
     * @return string
     * @throws ThemeException
     */
    public function url($url){

        if (preg_match('/^((http(s?):)?\/\/)/i',$url)) {
            return $url;
        }

        $fullUrl = 'assets/' . (empty($this->assets) ? '' : '/') . $this->assets . '/' . ltrim($url, '/');
        if (file_exists($fullPath = public_path($fullUrl))) {
            return $fullUrl;
        }

        $vendorUrl = 'assets/vendor/' . ltrim($url, '/');
        if (file_exists($fullPath = public_path($vendorUrl))) {
            return $vendorUrl;
        }

        throw new ThemeException("Asset not found [" . $url . "]");
    }
}