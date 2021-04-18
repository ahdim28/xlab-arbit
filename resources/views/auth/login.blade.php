@extends('layouts.layout-blank')

@section('content')
<form action="{{ route('login') }}" method="post">
    @csrf

    <div class="input-group mb-3">
      <input type="text" class="form-control @error('username') is-invalid @enderror" 
        name="username" value="{{ old('username') }}" placeholder="Username">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-user"></span>
        </div>
      </div>
      @include('components.field-error', ['field' => 'username'])
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control @error('password') is-invalid @enderror" 
            name="password" value="{{ old('password') }}" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      @include('components.field-error', ['field' => 'password'])
    </div>
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" name="remember" id="remember" 
            {{ old('remember') ? 'checked' : '' }}>
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>

      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
</form>
@endsection