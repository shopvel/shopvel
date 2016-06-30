<?php
namespace Shopvel\Component\Theme;

use Illuminate\Support\Facades\Config;

class Themes
{
    public $theme = null;
    private $themePath;

    /**
     * Themes constructor.
     */
    public function __construct()
    {
        $this->themePath = Config::get('theme.path', null);
    }

    /**
     * @param $name
     */
    public function set($name)
    {
        $paths = [];
        if ($name != 'backend') {
            $theme = new Theme($name, 'themes/' . $name);
            $paths[] = realpath(base_path('resources/views/themes/'.$name));
            $paths[] = realpath(base_path('resources/views/frontend'));
        } else {
            $theme = new Theme($name, 'backend');
            $paths[] = realpath(base_path('resources/views/backend'));
        }

        $this->theme = $theme;
        Config::set('view.paths', $paths);

        $finder = app('view.finder');
        $finder->setPaths($paths);

    }

    /**
     * @return string
     */
    public function get()
    {
        return $this->theme ? $this->theme->name : '';
    }

    /**
     * @param $url
     * @return mixed
     */
    public function url($url)
    {
        return $this->theme->url($url);
    }
}