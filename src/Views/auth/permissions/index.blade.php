@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Site Permissions
    </h1>
    <div class="page-subtitle">{{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} permissions</div>
    <div class="page-options d-flex">
      <a class="btn btn-sm btn-primary" href="{{ route('admin.auth.permissions.create') }}">New permission</a>
    </div>
</div>
<div class="row row-cards">
    <div class="col-lg-12">
        <div class="card">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-md-table-cell">Description</th>
                        <th class="d-none d-md-table-cell">Tag</th>
                        <th class="d-none d-md-table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                      <td>
                        <div>{{ $permission->label }}</div>
                        <div class="small text-muted">
                          Created: {{ $permission->created_at->toFormattedDateString() }}
                        </div>
                      </td>
                      <td>
                        <div>{{ $permission->description }}</div>
                        <div class="small text-muted">
                            {{ $permission->roles->count() }} assigned {{ Str::plural('role', $permission->roles->count()) }}
                        </div>
                      </td>
                      <td>
                        <div>{{ $permission->name }}</div>
                        <div class="small text-muted">
                            Code tag.
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                          <a class="btn btn-primary" href="{{ route('admin.auth.permissions.show', $permission) }}" role="button">
                            View
                          </a>
                          <a class="btn btn-primary" href="{{ route('admin.auth.permissions.edit', $permission) }}" role="button">
                            Edit
                          </a>

                          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                            <a href="{{ route('admin.auth.permissions.edit', $permission) }}" class="dropdown-item">
                              <i class="dropdown-icon fe fe-edit-2"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            {!! Form::open(['route' => ['admin.auth.permissions.destroy', $permission], 'method' => 'DELETE']) !!}
                            <button type="submit" class="dropdown-item">
                              <i class="dropdown-icon fe fe-trash"></i> Delete
                            </button>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($permissions->hasPages())
                {{ $permissions->links() }}
                @endif
        </div>
    </div>
</div>
@endsection
