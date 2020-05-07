@extends('admin::layouts.page')

@section('content')
<div class="row">
  <div class="col-sm-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body d-flex align-items-center">
        <span class="bg-blue text-white stamp mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><circle cx="12" cy="7" r="4"></circle><path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2"></path></svg>
        </span>
        <div class="mr-3 lh-sm">
          <div class="strong">
            {{ $users->count() }} Users
          </div>
          <p class="mb-0 text-muted">
            <span class="text-green d-inline-flex align-items-center lh-1">
              100% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg>
            </span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body d-flex align-items-center">
        <span class="bg-green text-white stamp mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path></svg>
        </span>
        <div class="mr-3 lh-sm">
          <div class="strong">
            {{ $roles->count() }} Roles
          </div>
          <p class="mb-0 text-muted">
            <span class="text-orange d-inline-flex align-items-center lh-1">
              0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body d-flex align-items-center">
        <span class="bg-yellow text-white stamp mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path></svg>
        </span>
        <div class="mr-3 lh-sm">
          <div class="strong">
            {{ $permissions->count() }} Permissions
          </div>
          <p class="mb-0 text-muted">
            <span class="text-orange d-inline-flex align-items-center lh-1">
              0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card card-sm">
      <div class="card-body d-flex align-items-center">
        <span class="bg-red text-white stamp mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path></svg>
        </span>
        <div class="mr-3 lh-sm">
          <div class="strong">
            {{ $providers->count() }} Providers
          </div>
          <p class="mb-0 text-muted">
            <span class="text-orange d-inline-flex align-items-center lh-1">
              0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-xl d-flex flex-column justify-content-center">
  <div class="empty">
    <div class="empty-icon">
      <img src="./static/illustrations/undraw_printing_invoices_5r4r.svg" height="128" class="mb-4" alt="">
    </div>
    <p class="empty-title h3">There's nothing else.</p>
    <p class="empty-subtitle text-muted">
      Try building something new.
    </p>
  </div>
</div>
@endsection
