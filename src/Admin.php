<?php

namespace LaravelBoilerplates\Admin;

use Illuminate\Http\Request;
use LaravelBoilerplates\BaseBoilerplate\Base;


class Admin
{
    /**
     * Wrap the laravel route() helper with the configured route prefix.
     *
     * @return string
     */
    public static function route($name, $parameters = [], $absolute = true) {
        return Base::route(config('admin.routes.prefix'), $name, $parameters, $absolute);
    }

    /**
     * Wrap the laravel request() helper with the configured route prefix.
     *
     * @return string
     */
    public static function requestIs($pattern) {
        return Base::requestIs(config('admin.routes.prefix'), $pattern);
    }
}
