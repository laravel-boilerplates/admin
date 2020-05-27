@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Roles</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
      <x-form-wrapper method="POST" action="auth.roles.store">
        <x-notification-modal class="btn-primary" text="Create Role">
            @include('admin::auth.roles._form')
            <x-slot name="footer">
              <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </x-slot>
        </x-notification-modal>
      </x-form-wrapper>
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
          @forelse($roles as $role)
            <tr>
              <td>
                <div class="d-flex lh-sm py-1 align-items-center">
                  <div class="flex-fill">
                    <div class="strong">{{ $role->name }}</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="strong">{{ $role->label }}</div>
              </td>
              <td>
                <div class="strong">{{ $role->description }}</div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4">
                <div class="empty">
                  <div class="empty-icon">
                    <!-- SVG icon code -->
                  </div>
                  <p class="empty-title h3">No roles found.</p>
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
      <p class="m-0 text-muted">Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} users</p>
    @if($roles->hasPages())
      {{ $roles->links() }}
    @endif
    </div>
  </div>
</div>
@endsection
