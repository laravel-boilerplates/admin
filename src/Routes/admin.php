<?php

use Illuminate\Support\Facades\Route;

/*
 |--------------------------------------------------------------------------
 | Auth Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register auth routes for your application. These
 | routes are loaded by the TablerServiceProvider within a group which
 | contains the "web" middleware group.
 |
 */

Route::middleware(config('admin.routes.middleware'))
  ->prefix(config('admin.routes.prefix'))
  ->name(config('admin.routes.prefix').'.')
  ->namespace('\LaravelBoilerplates\Admin\Controllers')
  ->group(function () {

    Route::get('/', function () {
        redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('setting', 'SettingController', [
        'except' => ['delete']
    ]);


    Route::prefix('auth')->name('auth.')->namespace('Auth')->group(function () {
      	Route::get('/', 'AuthController@index')->name('index');
      	Route::resource('/users', 'UserController');

      	Route::resource('/roles', 'RoleController');
      	Route::post('/roles/{role}/users', 'RoleUsersController@store')->name('roles.users.store');
      	Route::delete('/roles/{role}/users/{user}', 'RoleUsersController@destroy')->name('roles.users.destroy');

      	Route::resource('/permissions', 'PermissionController');
    });
});
