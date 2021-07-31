<?php

if (!function_exists('setNavBarActiveParent')) {
    function setNavBarActiveParent($path)
    {
        return \Illuminate\Support\Str::startsWith(Request::path(), $path) ? 'menu-open' : '';
    } 
}

if (!function_exists('setNavBarActiveChild')) {
    function setNavBarActiveChild($routeName)
    {
        return \Illuminate\Support\Str::startsWith(Route::currentRouteName(), $routeName) ? 'active' : '';
    }
}

if (!function_exists('getParentCategory')) {
    function getParentCategory($type)
    {
        if ($type == '1' || $type == '2') {
            return 'Thiếu niên 3Q China';
        }
        if ($type == '0') {
            return 'Thiếu niên 3Q VNG';
        } 
        if ($type == '3') {
            return 'Tân OMG 3Q VNG';
        }
        if ($type == '4') {
            return 'Tân OMG 3Q China';
        }
    }
}

if (!function_exists('getRouteParentCategory')) {
    function getRouteParentCategory($type)
    {
        if ($type == '1' || $type == '2') {
            return route('client.games.tn3q_china.index');
        }
        if ($type == '0') {
            return route('client.games.tn3q_vng.index');
        } 
        if ($type == '3') {
            return route('client.games.tan_omg_3q_vng.index');
        }
        if ($type == '4') {
            return route('client.games.tan_omg_3q_china.index');
        }
    }
}

if (!function_exists('getCurrentUser')) {
    function getCurrentUser()
    {
        return Auth::guard('web')->user();
    }
}

if (!function_exists('isUserLogin')) {
    function isUserLogin()
    {
        return Auth::guard('web')->check();
    }
}

if (!function_exists('getCurrentAdmin')) {
    function getCurrentAdmin()
    {
        return Auth::guard('admin')->user();
    }
}