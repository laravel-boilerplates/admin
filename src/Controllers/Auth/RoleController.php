<?php

namespace LaravelBoilerplates\Admin\Controllers\Auth;

use Illuminate\Routing\Controller;
use LaravelBoilerplates\Admin\Requests\RoleRequest as Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::with(['users', 'permissions'])->paginate();

      return view('admin.auth.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.auth.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LaravelAdmin\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $role = Role::create($request->all());

      flash($role->name . ' has been created.')->success();

      return redirect()->route('admin.auth.roles.edit', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
      return redirect()->route('admin.auth.roles.edit', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      return view('admin.auth.roles.edit')->with(compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LaravelAdmin\Requests\RoleRequest  $request
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      $role->update($request->all());

      flash($role->name . ' has been updated.')->success();

      return redirect()->route('admin.auth.roles.show', $role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      $name = $role->name;
      $role->delete();

      flash($name . ' has been deleted.')->success();

      return redirect()->route('admin.auth.roles.index');
    }
}
