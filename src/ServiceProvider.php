<?php

namespace LaravelBoilerplates\Admin;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/admin.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'admin');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/admin.php' => config_path('admin.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/Views' => resource_path('views/vendor/admin'),
            ], 'views');

            $this->publishes([
                __DIR__.'/Database/seeds' => database_path('seeds'),
            ], 'seeds');

            // $this->commands([]);
        }

        View::composer(
            'admin::auth.users._form', 'LaravelBoilerplates\Admin\Composers\UserFormComposer'
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/admin.php', 'admin');

        // Register the main class to use with the facade
        $this->app->singleton(Admin::class, function () {
            return new Admin;
        });
    }
}
