<?php

namespace LaravelBoilerplates\Admin\Composers;

use Illuminate\View\View;
use LaravelBoilerplates\Admin\Models\Auth\Role;
use LaravelBoilerplates\Admin\Models\Auth\Permission;

class UserFormComposer
{
    /**
     * All Roles.
     *
     * @var Role
     */
    protected $roles;
    /**
     * All Permissions.
     *
     * @var Permission
     */
    protected $permissions;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Role $roles, Permission $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
          'roles' => $this->roles,
          'permissions' => $this->permissions
        ]);
    }
}
