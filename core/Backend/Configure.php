<?php
namespace Shopvel\Backend;

class Configure
{
    public static function config()
    {
        \Config::set('mail.from', [
            'address' => env('MAIL_FROM_ADDRESS', null),
            'name' => 'Shopvel eCommerce'
        ]);
    }

    public static function menu()
    {
        \Menu::add([
            'index' => 0,
            'icon-class' => 'fa fa-dashboard',
            'name' => 'dashboard',
            'label' => trans('backend/dashboard.dashboard'),
            'url' => url('backend/c/dashboard')
        ]);

        \Menu::add([
            'index' => 10,
            'icon-class' => 'fa fa-cube',
            'name' => 'article',
            'label' => trans('backend/article.articles')
        ]);

            \Menu::addChild([
                'index' => 10,
                'group' => true,
                'target' => 'article',
                'name' => 'navigation',
                'label' => trans('backend/general.navigation')
            ]);

            \Menu::addChild([
                'index' => 10,
                'target' => 'article',
                'target_group' => 'navigation',
                'label' => trans('backend/general.show_all'),
                'url' => url('backend/c/article')
            ]);

            \Menu::addChild([
                'index' => 20,
                'target' => 'article',
                'target_group' => 'navigation',
                'label' => trans('backend/article.add'),
                'url' => url('backend/c/article/a/add')
            ]);
    }
}