@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Role Administration
    </h1>
    <div class="page-subtitle">Role: '{{ $role->name }}'</div>
    <div class="page-options d-flex">
      <a class="btn btn-primary" href="{{ route('admin.auth.roles.edit', $role) }}">Edit Role</a>
    </div>
</div>

<div class="row row-cards">
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Assigned Users</h3>
      </div>
      <div class="table-responsive">
        @component('users.table', ['users' => $role->users, 'deleteRoute' => 'admin.auth.roles.edit'])
          There are no users assigned to this role.
        @endcomponent
      </div>
    </div>
  </div>
  <div class="col-lg-7">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Assigned Permissions</h3>
      </div>
      <div class="table-responsive">
        @component('permissions.table', ['permissions' => $role->permissions, 'deleteRoute' => 'admin.auth.roles.edit'])
          There are no permissions assigned to this role.
        @endcomponent
      </div>
    </div>
  </div>
</div>
@endsection
