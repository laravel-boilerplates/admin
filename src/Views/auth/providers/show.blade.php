@extends('admin::layouts.page')

@section('content')
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <div class="page-pretitle">
        Detail
      </div>
      <h2 class="page-title">{{ ucfirst($provider->name) }} Provider</h2>
    </div>
    <div class="col-auto ml-auto d-print-none">
    </div>
  </div>
</div>
<div class="box">
  <div class="card">

  </div>
</div>
@endsection
