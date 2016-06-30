<?php
namespace Shopvel\Backend\Controller;

use Shopvel\Backend\Controller\Controller;

class DashboardController extends Controller
{
    public function getIndex()
    {
        return view('master');
    }
}