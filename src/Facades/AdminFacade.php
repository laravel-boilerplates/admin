<?php

namespace LaravelBoilerplates\Admin\Facades;

use LaravelBoilerplates\Admin\Admin;
use Illuminate\Support\Facades\Facade;

class AdminFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Admin::class;
    }
}
