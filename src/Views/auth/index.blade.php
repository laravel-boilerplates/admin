@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <h2 class="page-title">
        Search results
      </h2>
    </div>
    <div class="col-auto">
      <div class="text-muted text-h5 mt-2">About 2,410 results</div>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <div class="btn-list">
        <a href="#" class="btn btn-outline-primary btn-sm">View Users</a>
        <a href="#" class="btn btn-outline-primary btn-sm">View Roles</a>
        <a href="#" class="btn btn-outline-primary btn-sm">View Permissions</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-3">
    <x-form-wrapper method="GET" action="auth.index">
      <label class="form-label">Object Category</label>
      <div class="mb-3">
        <x-form-toggle name="users" checked>Users</x-form-toggle>
        <x-form-toggle name="roles" checked>Roles</x-form-toggle>
        <x-form-toggle name="permissions" checked>Permissions</x-form-toggle>
      </div>
      <div class="mb-3">
        <x-form-text name="filter[name]" label="Object Name" placeholder="Enter Name"></x-form-text>
      </div>
      <div class="mt-5">
        <button type="submit" class="btn btn-primary btn-block">
          Search
        </button>
        <a href="#" class="btn btn-link btn-block">
          Reset to defaults
        </a>
      </div>
    </x-form-wrapper>
  </div>
  <div class="col-9">
    @forelse($results as $result)
    <div class="card">
      <div class="card-body">
        <div class="row row-sm align-items-center">
          @if( $result instanceOf \LaravelBoilerplates\Admin\Models\Auth\User)
          <div class="col-auto">
            <span class="avatar avatar-lg" style="background-image: url(./static/avatars/000m.jpg)"></span>
          </div>
          @endif
          <div class="col">
            <h4 class="card-title m-0">
              <a href="#">{{ $result->name }}</a>
            </h4>
            <div class="text-muted">
              {{ $result->label }}
            </div>
            @if( $result instanceOf \LaravelBoilerplates\Admin\Models\Auth\User)
            <div class="small mt-1">
              <span class="text-orange">●</span> Presense Unknown
            </div>
            @endif
          </div>
          <div class="col-auto">
            <a href="#" class="btn btn-sm btn-white d-none d-md-inline-block">
              Subscribe
            </a>
          </div>
          <div class="col-auto">
            <div class="dropdown">
              <button class="btn-options" type="button" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="19" r="1"></circle><circle cx="12" cy="5" r="1"></circle></svg>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">
                  Edit
                </a>
                <a class="dropdown-item" href="#">
                  Another action
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="card">
      <div class="card-body">
        <div class="row row-sm align-items-center">
          <div class="col-auto">
            <span class="avatar avatar-lg" style="background-image: url(https://preview-dev.tabler.io/static/illustrations/undraw_quitting_time_dm8t.svg)"></span>
          </div>
          <div class="col">
            <h4 class="card-title m-0">
              <a href="#">Paweł Kuna</a>
            </h4>
            <div class="text-muted">
              Working in Yombu
            </div>
            <div class="small mt-1">
              <span class="text-success">●</span> Online
            </div>
          </div>
          <div class="col-auto">
            <a href="#" class="btn btn-sm btn-white d-none d-md-inline-block">
              Subscribe
            </a>
          </div>
          <div class="col-auto">
            <div class="dropdown">
              <button class="btn-options" type="button" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="19" r="1"></circle><circle cx="12" cy="5" r="1"></circle></svg>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">
                  Action
                </a>
                <a class="dropdown-item" href="#">
                  Another action
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforelse
  </div>
</div>
@endsection
