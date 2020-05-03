<?php

namespace LaravelBoilerplates\Admin;

class Admin
{
    public static function user() {
      $userClass = config('auth.providers.users.model');

      return new $userClass;
    }
}
