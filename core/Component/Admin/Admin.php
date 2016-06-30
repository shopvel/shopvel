<?php
namespace Shopvel\Component\Admin;

class Admin
{
    public function user()
    {
        return \Auth::guard('admin')->user();
    }
}