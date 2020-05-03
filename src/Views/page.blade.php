@extends('layouts.app')

@section('body')
<div class="page">
  @include('layouts.header')
  @include('admin::nav')
  <div class="content">
    <div class="container-xl">
      @yield('content')
    </div>
  </div>
</div>
@endsection
