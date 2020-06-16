@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Settings</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <a href="#" class="btn btn-primary ml-3 d-none d-sm-inline-block" data-toggle="modal" data-target="#modal-report">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        Create Setting
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
            <th>Key</th>
            <th>Name</th>
            <th>Updated</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
        @forelse($settings as $setting)
          <tr>
            <td>
              <div class="d-flex lh-sm py-1 align-items-center">
                <div class="flex-fill">
                  <div class="strong">{{ $setting->key }}</div>
                </div>
              </div>
            </td>
            <td>
              <div class="strong">{{ $setting->name }}</div>
            </td>
            <td>
              <div class="strong">{{ $setting->updated_at }}</div>
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
      <p class="m-0 text-muted">Showing {{ $settings->firstItem() }} to {{ $settings->lastItem() }} of {{ $settings->total() }} settings</p>
    @if($settings->hasPages())
      {{ $settings->links() }}
    @endif
    </div>
  </div>
</div>
@endsection
