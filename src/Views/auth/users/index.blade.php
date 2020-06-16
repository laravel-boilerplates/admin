@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Users</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <x-notification-modal class="btn-primary" text="Register User" size="xl">
        @include('admin::auth.users._form')
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
                <x-element-user-avatar :user=$user />
                <div class="flex-fill">
                  <div class="strong">{{ $user->name }}</div>
                  <div class="text-muted text-h5"><a href="mailto:{{ $user->email }}" class="text-reset">{{ $user->email }}</a></div>
                </div>
              </div>
            </td>
            <td>
              <div>{{ $user->title }}</div>
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
