@extends('layouts.application')

@section('body-attr')
class="hold-transition sidebar-mini layout-fixed"
@endsection

@section('layout-content')
<div class="wrapper">

    <!-- Navbar -->
    @include('layouts.includes.navbar')
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    @include('layouts.includes.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('components.breadcrumbs')
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    @include('layouts.includes.footer')
    
</div>
@endsection