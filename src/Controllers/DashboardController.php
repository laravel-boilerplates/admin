<?php

namespace LaravelBoilerplates\Admin\Controllers;

use Admin;
use LaravelBoilerplates\Admin\Models\Auth\Role;
use LaravelBoilerplates\Admin\Models\Auth\Provider;
use LaravelBoilerplates\Admin\Models\Auth\Permission;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $users = Admin::user()->paginate();
      $roles = Role::with(['users', 'permissions'])->paginate();
      $permissions = Permission::with('roles')->paginate();

      return view('admin::dashboard', compact('users', 'roles', 'permissions'));
    }
}
