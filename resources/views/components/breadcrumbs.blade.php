@isset($breadcrumbs)
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            @foreach ($breadcrumbs as $key => $val)
            <li class="breadcrumb-item {{ empty($val) ? 'active' : '' }}">
              @if (empty($val))
                {{ $key }}
              @else
                <a href="{{ $val }}">{{ $key }}</a>
              @endif
            </li>
            @endforeach
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endisset