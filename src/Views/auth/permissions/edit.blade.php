@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Permission Administration
    </h1>
    <div class="page-subtitle">Permission: '{{ $permission->name }}'</div>
    <div class="page-options d-flex">
      <a class="btn btn-primary" href="{{ route('admin.auth.permissions.edit', $permission) }}">Edit Permission</a>
    </div>
</div>

@endsection
