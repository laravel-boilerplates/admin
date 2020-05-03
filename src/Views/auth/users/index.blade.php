@extends('admin::page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Users</h2>
    </div>
    <div class="col-auto">
      <div class="text-muted text-h5 mt-2">Showing {{ $users->firstItem() }} through {{ $users->lastItem() }} of {{ $users->total() }} users</div>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block" data-toggle="modal" data-target="#modal-report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Register new User
      </a>
      <a href="#" class="btn btn-primary ml-3 d-sm-none btn-icon" data-toggle="modal" data-target="#modal-report" aria-label="Create new report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
      </a>
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
            <th>Title</th>
            <th>Role</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>
              <div class="d-flex lh-sm py-1 align-items-center">
                <x-element-avatar :user=$user />
                <div class="flex-fill">
                  <div class="strong">{{ $user->name }}</div>
                  <div class="text-muted text-h5"><a href="mailto:{{ $user->email }}" class="text-reset">{{ $user->email }}</a></div>
                </div>
              </div>
            </td>
            <td>
              <div>Automation Specialist IV</div>
              <div class="text-muted text-h5">Accounting</div>
            </td>
            <td class="text-muted">
              User
            </td>
            <td>
              <a href="#">Edit</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      <p class="m-0 text-muted">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users</p>
    @if($users->hasPages())
      {{ $users->links() }}
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
    <div class="page-subtitle">{{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users</div>
    <div class="page-options d-flex">
      <a class="btn btn-sm btn-primary" href="{{ route('admin.auth.users.create') }}">New user</a>
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
                    @foreach($users as $user)
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
            @if($users->hasPages())
              {{ $users->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
