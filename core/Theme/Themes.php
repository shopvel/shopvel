<?php
namespace Shopvel\Theme;

use Illuminate\Support\Facades\Config;

class Themes
{
    public $theme = null;
    private $themePath;

    public function __construct()
    {
        $this->themePath = Config::get('theme.path', null);
    }

    public function set($name)
    {
        $paths = [];
        if ($name != 'admin') {
            $theme = new Theme($name, 'themes/' . $name);
            $paths[] = realpath(base_path('resources/views/themes/'.$name));
            $paths[] = realpath(base_path('resources/views/shop'));
        } else {
            $theme = new Theme($name, 'admin');
            $paths[] = realpath(base_path('resources/views/admin'));
        }

        $this->theme = $theme;
        Config::set('view.paths', $paths);

        $finder = app('view.finder');
        $finder->setPaths($paths);

    }

    public function get()
    {
        return $this->theme ? $this->theme->name : '';
    }

    public function url($url)
    {
        return $this->theme->url($url);
    }

    public function css($href)
    {
        return '<link media="all" type="text/css" rel="stylesheet" href="' . $this->url($href) . '">';
    }

    public function js($href)
    {
        return '<script src="' . $this->url($href) . '"></script>';
    }

    public function img($src, $alt = '', $class = '', $attr = array())
    {
        return '<img src="' . $this->url($src) . '" alt="' . $alt . '" class="' . $class . '" ' . $this->htmlAttributes($attr). '>';
    }

    private function htmlAttributes($attr)
    {
        $formatted = join(' ', array_map(function($key) use ($attr) {
            if (is_bool($attr[$key])) {
                return $attr[$key] ? $key : '';
            }
            return $key . '="' . $attr[$key] . '"';
        }, array_keys($attr)));

        return $formatted;
    }
}