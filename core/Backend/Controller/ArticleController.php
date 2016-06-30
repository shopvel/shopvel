<?php
namespace Shopvel\Backend\Controller;

use Shopvel\Backend\Controller\Controller;

class ArticleController extends Controller
{
    public function getIndex()
    {
        return view('article.all');
    }

    public function getAdd()
    {
        return view('article.add');
    }
}