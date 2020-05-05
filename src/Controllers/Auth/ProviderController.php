<?php

namespace LaravelBoilerplates\Admin\Controllers\Auth;

use Socialite;
use Illuminate\Support\Collection;
use Illuminate\Routing\Controller;
use LaravelBoilerplates\Admin\Models\Auth\Provider;
use LaravelBoilerplates\Admin\Requests\Auth\RoleRequest as Request;

class ProviderController extends Controller
{
    /**
     * The alert id attribute.
     *
     * @var Illuminate\Support\Collection
     */
    public $providers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $providers = new Collection();

        foreach (array_diff(scandir(base_path('vendor/socialiteproviders')), array('..', '.', 'manager')) as $name) {
          $provider = new Provider([
            'name' => $name,
            'vendor_dir' => 'socialiteproviders/' . $name
          ]);

          $providers->push($provider);
        }

        $this->providers = $providers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $providers = $this->providers;

      return view('admin::auth.providers.index')->with(compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin::auth.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LaravelBoilerplates\Admin\Requests\Auth\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $role = Role::create($request->all());

      flash($role->name . ' has been created.')->success();

      return redirect()->route('admin.auth.providers.edit', $role);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $provider
     * @return \Illuminate\Http\Response
     */
    public function show($provider)
    {
      $provider = $this->providers->get($provider);

      dd($this->providers);

      return view('admin::auth.providers.show')->with(compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      return view('admin.auth.providers.edit')->with(compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LaravelBoilerplates\Admin\Requests\Auth\RoleRequest  $request
     * @param  \App\Models\Auth\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
      $role->update($request->all());

      flash($role->name . ' has been updated.')->success();

      return redirect()->route('admin.auth.providers.show', $role);
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

      return redirect()->route('admin.auth.providers.index');
    }
}
