@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">Create Role</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
    </div>
  </div>
</div>
<x-form-wrapper class="card" action="auth.roles.store">
  <div class="card-body">
    @include('admin::auth.roles._form')
  </div>
  <div class="card-footer text-right">
    <button type="submit" class="btn btn-primary">Create Role</button>
  </div>
</x-form-wrapper>
@endsection
