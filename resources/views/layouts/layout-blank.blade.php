@extends('layouts.application')

@section('body-attr')
class="hold-transition login-page"
@endsection

@section('layout-content')
<div class="login-box">
    <!-- /.login-logo -->
    @include('components.alert')
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('login') }}" class="h1">{{ $config['app_name'] }}</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        @yield('content')

      </div>
      <div class="card-footer text-center">
        Copyright &copy; <strong>{{ $config['app_name_short'] }}</strong> {{ now()->format('Y') }}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
