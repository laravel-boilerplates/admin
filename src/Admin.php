<?php

namespace LaravelBoilerplates\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class Admin
{
    /**
     * Provide the currently configured User model for this application.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function user() {
      $userClass = config('auth.providers.users.model');

      return new $userClass;
    }

    /**
     * Wrap the laravel route() helper with the configured route prefix.
     *
     * @return string
     */
    public static function route($name, $parameters = [], $absolute = true) {
      $generator = app(UrlGenerator::class);
      $name = config('admin.routes.prefix') . '.' . $name;

      return $generator->route($name, $parameters, $absolute);
    }

    /**
     * Wrap the laravel request() helper with the configured route prefix.
     *
     * @return string
     */
    public static function requestIs($pattern) {

      $pattern = config('admin.routes.prefix') . '/' . $pattern;

      return request()->is($pattern);
    }
}
