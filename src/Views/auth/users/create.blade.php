@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Action
      </div>
      <h2 class="page-title">Create User</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
    </div>
  </div>
</div>
<x-form-wrapper class="card" action="auth.roles.store">
  <div class="card-body">
    @include('admin::auth.users._form')
  </div>
  <div class="card-footer text-right">
    <button type="submit" class="btn btn-primary">Store User</button>
  </div>
</x-form-wrapper>
@endsection
