<?php
namespace Shopvel\Admin\Article;

use Shopvel\Controller;

class Article extends Controller
{
    public function getAll()
    {
        return view('article.all');
    }

    public function getAdd()
    {
        return view('article.add');
    }
}