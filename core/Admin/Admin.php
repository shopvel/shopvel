<?php
namespace Shopvel\Admin;

class Admin
{
    public function user()
    {
        return \Auth::guard('admin')->user();
    }
}