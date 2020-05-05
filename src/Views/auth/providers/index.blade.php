@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Providers</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <x-notification-modal class="btn-primary" text="Create Provider">
        @include('admin::auth.providers._form')
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
            <th>Status</th>
            <th>Client ID</th>
            <th>Package Location</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($providers as $provider)
            <tr>
              <td>
                <div class="d-flex lh-sm py-1 align-items-center">
                  <div class="flex-fill">
                    <div class="strong">{{ $provider->name }}</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="strong">{{ $provider->status }}</div>
              </td>
              <td>
                <div class="strong">{{ $provider->client_id }}</div>
              </td>
              <td>
                <div class="strong">vendor/{{ $provider->vendor_dir }}</div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">
                <div class="empty">
                  <div class="empty-icon">
                    <!-- SVG icon code -->
                  </div>
                  <p class="empty-title h3">No providers found</p>
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
  </div>
</div>
@endsection
