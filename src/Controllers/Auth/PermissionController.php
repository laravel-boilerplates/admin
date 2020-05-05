<?php

namespace LaravelBoilerplates\Admin\Controllers\Auth;

use Illuminate\Routing\Controller;
use LaravelBoilerplates\Admin\Models\Auth\Permission;
use LaravelBoilerplates\Admin\Requests\PermissionRequest as Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $permissions = Permission::with('roles')->paginate();

      return view('admin::auth.permissions.index')->with(compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.auth.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LaravelAdmin\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $permission = Permission::create($request->all());

      flash($permission->name . ' has been created.')->success();

      return redirect()->route('admin.auth.permissions.edit', $permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
      return redirect()->route('admin.auth.permissions.edit', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
      return view('admin.auth.permissions.edit')->with(compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LaravelAdmin\Requests\PermissionRequest  $request
     * @param  \App\Models\Auth\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
      $permission->update($request->all());

      flash($permission->name . ' has been updated.')->success();

      return redirect()->route('admin.auth.permissions.show', $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
      $name = $permission->name;
      $permission->delete();

      flash($name . ' has been deleted.')->success();

      return redirect()->route('admin.auth.permissions.index');
    }
}
