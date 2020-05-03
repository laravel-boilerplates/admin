<?php

use LaravelBoilerplates\Admin\Models\Auth\User;
use LaravelBoilerplates\Admin\Models\Auth\Role;
use LaravelBoilerplates\Admin\Models\Auth\Permission;

use Illuminate\Database\Seeder;

class AuthorizationTablesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = Role::create([
      'name' => 'admin',
      'label' => 'Administrator',
      'description' => 'Bypasses all roles and permissions.'
    ]);

    if($user = User::first()) {
      $user->assignRole($admin);
    }

    $editRoles = Permission::create([
      'name' => 'edit-roles',
      'label' => 'Edit Roles',
      'description' => 'Grants the ability to edit existing roles.'
    ]);
    $createRoles = Permission::create([
      'name' => 'create-roles',
      'label' => 'Create Roles',
      'description' => 'Grants the ability to create roles.'
    ]);
    $editPermisions = Permission::create([
      'name' => 'edit-permissions',
      'label' => 'Edit Permissions',
      'description' => 'Grants the ability to edit existing permissions.'
    ]);
    $createPermissions = Permission::create([
      'name' => 'create-permissions',
      'label' => 'Create permissions',
      'description' => 'Grants the ability to create permissions.'
    ]);

    $authManager = Role::create([
      'name' => 'authorization-manager',
      'label' => 'Authorization Manager',
      'description' => 'Grants the ability to manage authorization rules.'
    ]);
    $authManager->givePermissionTo($editRoles);
    $authManager->givePermissionTo($createRoles);
    $authManager->givePermissionTo($editPermisions);
    $authManager->givePermissionTo($createPermissions);


    $editUsers = Permission::create([
      'name' => 'edit-users',
      'label' => 'Edit Users',
      'description' => 'Grants the ability to edit existing users.'
    ]);
    $impersonateUsers = Permission::create([
      'name' => 'impersonate-users',
      'label' => 'Impersonate Users',
      'description' => 'Grants the ability to impersonate users.'
    ]);

    $userManager = Role::create([
      'name' => 'user-manager',
      'label' => 'User Manager',
      'description' => 'Grants the ability to manage users.'
    ]);
    $userManager->givePermissionTo($editUsers);
    $userManager->givePermissionTo($impersonateUsers);


    $viewReports = Permission::create([
      'name' => 'view-reports',
      'label' => 'View Reports',
      'description' => 'Grants the ability to view reports.'
    ]);

    $projectManager = Role::create([
      'name' => 'project-manager',
      'label' => 'Project Manager',
      'description' => 'Grants the ability to manage projects and all project settings.'
    ]);
    $viewProjects = Permission::create([
      'name' => 'view-projects',
      'label' => 'View Projects',
      'description' => 'Grants the ability to view projects.'
    ]);
    $editProjects = Permission::create([
      'name' => 'edit-projects',
      'label' => 'Edit Projects',
      'description' => 'Grants the ability to edit projects.'
    ]);
    $projectManager->givePermissionTo($viewProjects);
    $projectManager->givePermissionTo($editProjects);

  }
}
