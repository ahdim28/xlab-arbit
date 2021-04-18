@extends('layouts.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
          <small>Today is {{ now()->format('l, j F Y') }} (<em id="time-part"></em>)</small>
        </div>
      </div>
    </div>
</div>
<div class="callout callout-info">
  <h5>Welcome, <strong><i>{{ auth()->user()->name }} !</i></strong></h5>
  <p>Your IP : <strong>{{ auth()->user()->ip_address ?? '-' }}</strong> | Last Activity : <strong>{{ !empty(auth()->user()->last_access) ? auth()->user()->last_access->format('d F Y (H:i A)') : '-' }}</strong></p>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
@endsection

@section('jsbody')
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script>
    $(document).ready(function() {
      var interval = setInterval(function() {
          var momentNow = moment();
          $('#time-part').html(momentNow.format('hh:mm:ss A'));
      }, 100);
    });
</script>
@endsection