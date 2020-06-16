<?php

namespace LaravelBoilerplates\Admin\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use LaravelBoilerplates\Admin\Models\Auth\User;
use LaravelBoilerplates\Admin\Models\Auth\Role;
use LaravelBoilerplates\Admin\Models\Auth\Permission;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $users = $request->has('users') ? QueryBuilder::for(User::class)->allowedFilters('name')->get() : collect([]);
      $roles = $request->has('roles') ? QueryBuilder::for(Role::class)->allowedFilters('name')->get() : collect([]);
      $permissions = $request->has('permissions') ? QueryBuilder::for(Permission::class)->allowedFilters('name')->get() : collect([]);

      $results = $users->concat($roles->concat($permissions))->paginate();

      return view('admin::auth.index')->with(compact('results'));
    }
}
