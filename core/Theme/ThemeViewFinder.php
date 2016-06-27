<?php
namespace Shopvel\Theme;

use Illuminate\Filesystem\Filesystem;
use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{
    protected $engine;

    /**
     * ThemeViewFinder constructor.
     * @param Filesystem $files
     * @param array $paths
     * @param array|null $extensions
     * @param $engine
     */
    public function __construct(Filesystem $files, array $paths, array $extensions = null, $engine)
    {
        $this->engine = $engine;
        parent::__construct($files, $paths, $extensions);
    }

    /**
     * @param $paths
     */
    public function setPaths($paths){
        $this->paths = $paths;
    }
}