@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Permissions</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <x-notification-modal class="btn-primary" text="Create Permission">
        @include('admin::auth.permissions._form')
      </x-notification-modal>
    </div>
  </div>
</div>
<div class="box">
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Label</th>
            <th>Description</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($permissions as $permission)
            <tr>
              <td>
                <div class="d-flex lh-sm py-1 align-items-center">
                  <div class="flex-fill">
                    <div class="strong">{{ $permission->key }}</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="strong">{{ $permission->name }}</div>
              </td>
              <td>
                <div class="strong">{{ $permission->updated_at }}</div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">
                <div class="empty">
                  <div class="empty-icon">
                    <!-- SVG icon code -->
                  </div>
                  <p class="empty-title h3">No results found</p>
                  <p class="empty-subtitle text-muted">
                    Try adjusting your search or filter to find what you're looking for.
                  </p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      <p class="m-0 text-muted">Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} users</p>
    @if($permissions->hasPages())
      {{ $permissions->links() }}
    @endif
    </div>
  </div>
</div>
@endsection


@section('contents')
<div class="page-header">
    <h1 class="page-title">
        User Administration
    </h1>
    <div class="page-subtitle">{{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} users</div>
    <div class="page-options d-flex">
      <a class="btn btn-sm btn-primary" href="{{ Admin::route('auth.users.create') }}">New user</a>
    </div>
</div>
<div class="row row-cards">
    <div class="col-lg-12">
        <div class="card">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th class="w-1"></th>
                        <th>Name</th>
                        <th class="d-none d-md-table-cell">Email</th>
                        <th class="d-none d-md-table-cell">Phone</th>
                        <th class="d-none d-md-table-cell">Account Status</th>
                        <th class="d-none d-md-table-cell">Auth Source</th>
                        <th class="d-none d-md-table-cell">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $user)
                    <tr>
                      <td class="text-center">
                        component('users.avatar', compact('user')) endcomponent
                      </td>
                      <td>
                        <div>{{ $user->name }}</div>
                        <div class="small text-muted">
                          Registered: {{ $user->created_at->toFormattedDateString() }}
                        </div>
                      </td>
                      <td>
                        <div>{{ $user->email }}</div>
                        <div class="small text-muted">
                          @if( $user->hasVerifiedEmail() )
                            <span class="status-icon bg-success"></span> Verified on {{ $user->email_verified_at->toFormattedDateString() }}
                          @else
                            <span class="status-icon bg-danger"></span> Unverified
                          @endif
                        </div>
                      </td>
                      <td>
                        <div>Unknown</div>
                        <div class="small text-muted">
                            <span class="status-icon bg-warning"></span> Unverified
                        </div>
                      </td>
                      <td>
                        <div>{{ $user->updated_at->toDayDateTimeString() }}</div>
                        <div class="small text-muted">
                          @if( $user->is_active )
                            <span class="status-icon bg-success"></span> Activated on {{ $user->activated_at->toFormattedDateString() }}
                          @elseif( $user->is_pending_activation)
                            <span class="status-icon bg-warning"></span> Pending activation on {{ $user->activated_at->toFormattedDateString() }}
                          @else
                            <span class="status-icon bg-danger"></span> Inactive
                          @endif
                        </div>
                      </td>
                      <td>
                        component('users.source', compact('user')) endcomponent
                      </td>
                      <td class="text-center">
                        component('table.actions', ['model' => $user, 'route' => 'admin.auth.users']) endcomponent
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
