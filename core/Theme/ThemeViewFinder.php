<?php
namespace Shopvel\Theme;

use Illuminate\Filesystem\Filesystem;
use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{
    protected $engine;

    public function __construct(Filesystem $files, array $paths, array $extensions = null, $engine)
    {
        $this->engine = $engine;
        parent::__construct($files, $paths, $extensions);
    }

    public function setPaths($paths){
        $this->paths = $paths;
    }
}