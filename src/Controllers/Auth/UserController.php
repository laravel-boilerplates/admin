<?php

namespace LaravelBoilerplates\Admin\Controllers\Auth;

use Base;
use Illuminate\Routing\Controller;
use LaravelBoilerplates\Admin\Models\Auth\Role;
use LaravelBoilerplates\Admin\Models\Auth\Permission;
use LaravelBoilerplates\Admin\Requests\UserRequest as Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = Base::user()->paginate();

      return view('admin::auth.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin::auth.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LaravelAdmin\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Base::user()->create($request->all());

      flash($user->name . ' has been created. You can now add contacts.', 'success');

      return redirect()->route('admin.auth.users.edit', [$user, 'section' => 'contacts']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return view('admin.auth.users.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('admin.auth.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LaravelAdmin\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $user->update($request->all());

      flash($user->name . ' has been updated.')->success();

      return redirect()->route('admin.auth.users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $name = $user->name;

      if(auth()->user()->is($user)) {
        flash('You cannot archive yourself!')->error();
        return back();

      } else {
        $user->delete();
        flash($name . ' has been archived.')->success();
        return redirect()->route('admin.auth.users.index');
      }

    }
}
