<?php

namespace Gmlo\CMS;


class CMS
{

    protected $current_route_name;

    public function __construct()
    {
        $this->current_route_name = \Route::current()->getName();
    }


    public function assetPath($file_name = '')
    {
        return asset('vendor/gmlo/cms/' . $file_name);
    }

    public function makeLinkForSidebarMenu($route_name, $text, $icon)
    {
        $class = '';
        $prefix = explode('.', $this->current_route_name);
        array_pop($prefix);
        $prefix = implode('.', $prefix);

        if($route_name == $this->current_route_name or $prefix . '.index' == $route_name)
        {
            $class = 'active';
        }
        return view('CMS::partials._link_sidebar_menu', compact ('route_name', 'text', 'icon', 'class'));
    }

}