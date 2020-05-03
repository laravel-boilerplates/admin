@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        User Administration
    </h1>
    <div class="page-subtitle">UUID: {{ $user->uuid }}</div>
    <div class="page-options d-flex">
      <a class="btn btn-primary" href="{{ route('admin.auth.users.edit', $user) }}">Edit User</a>
    </div>
</div>

<div class="row row-cards">
  <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <div class="media">
          <span class="avatar avatar-xxl mr-5" style="background-image: url(demo/faces/male/21.jpg)"></span>
          <div class="media-body">
            <h4 class="m-0">{{ $user->name }}</h4>
            <p class="text-muted mb-0">{{ $user->email }}</p>
            <ul class="social-links list-inline mb-0 mt-2">
              <li class="list-inline-item">
                <a href="tel:+1{{ $user->phone_number }}" title="Phone" data-toggle="tooltip" data-original-title="+1{{ $user->phone_number }}"><i class="fa fa-phone"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="mailto:{{ $user->email }}" title="Email" data-toggle="tooltip" data-original-title="{{ $user->email }}"><i class="fa fa-envelope"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-8">
    <div class="card">
      <div class="card-header">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="New Notification">
          <div class="input-group-append">
            <button type="button" class="btn btn-secondary">
              <i class="fe fe-camera"></i>
            </button>
          </div>
        </div>
      </div>
      <ul class="list-group card-list-group">
      @forelse($user->notifications as $notification)
        <li class="list-group-item py-5">
          <div class="media">
            <div class="media-object avatar avatar-md mr-4" style="background-image: url(demo/faces/male/16.jpg)"></div>
            <div class="media-body">
              <div class="media-heading">
                <small class="float-right text-muted">4 min</small>
                <h5>Peter Richards</h5>
              </div>
              <div>
                Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras
                justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus.
              </div>
            </div>
          </div>
        </li>
      @empty
        <li class="list-group-item py-5">
          No notifications have been sent to this user.
        </li>
      @endforelse
      </ul>
    </div>
  </div>
</div>
@endsection
