@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Role Administration
    </h1>
    <div class="page-subtitle">{{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} roles</div>
    <div class="page-options d-flex">
      <a class="btn btn-sm btn-primary" href="{{ route('admin.auth.roles.create') }}">New role</a>
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
                    @foreach($roles as $role)
                    <tr>
                      <td>
                        <div>{{ $role->label }}</div>
                        <div class="small text-muted">
                          Created: {{ $role->created_at->toFormattedDateString() }}
                        </div>
                      </td>
                      <td>
                        <div>{{ $role->description }}</div>
                        <div class="small text-muted">
                            {{ $role->users->count() }} assigned {{ Str::plural('user', $role->users->count()) }}
                        </div>
                      </td>
                      <td>
                        <div>{{ $role->name }}</div>
                        <div class="small text-muted">
                            Code tag.
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                          <a class="btn btn-primary" href="{{ route('admin.auth.roles.show', $role) }}" role="button">
                            View
                          </a>
                          <a class="btn btn-primary" href="{{ route('admin.auth.roles.edit', $role) }}" role="button">
                            Edit
                          </a>

                          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu">
                            <a href="{{ route('admin.auth.roles.edit', $role) }}" class="dropdown-item">
                              <i class="dropdown-icon fe fe-edit-2"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            {!! Form::open(['route' => ['admin.auth.roles.destroy', $role], 'method' => 'DELETE']) !!}
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
            @if($roles->hasPages())
                {{ $roles->links() }}
                @endif
        </div>
    </div>
</div>
@endsection
