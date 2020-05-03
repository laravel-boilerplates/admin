<?php

namespace LaravelBoilerplates\Admin\Controllers\Auth;

use Illuminate\Routing\Controller;
use LaravelBoilerplates\Admin\Requests\RoleRequest as Request;

class RoleUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LaravelAdmin\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $podcast = Podcast::published()->findOrFail(request('podcast_id'));

      $podcast->users()->attach(Auth::user());

      return response('', 204);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
      return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      return;
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
      return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      //
    }
}
