@extends('layouts.layout')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-edit"></i>
        Configurations
      </h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-5 col-sm-3">
          <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="upload-tab" data-toggle="pill" href="#upload" role="tab" aria-controls="upload" aria-selected="true">Upload</a>
            <a class="nav-link active" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">Application</a>
            <a class="nav-link" id="market-tab" data-toggle="pill" href="#market" role="tab" aria-controls="market" aria-selected="false">Market</a>
          </div>
        </div>
        <div class="col-7 col-sm-9">
          <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade" id="upload" role="tabpanel" aria-labelledby="upload-tab">
                @foreach ($data['upload'] as $upload)
                <div class="row">
                    <div class="col-md-1 text-center">
                        @if ($upload->name == 'notification')
                        <i class="fas fa-file-audio" style="font-size: 1.5em;"></i>
                        @else
                        <img src="{{ $upload->image($upload->name) }}" style="width: 80px;">
                        @endif
                    </div>
                    <div class="col-md-11">
                        <form id="upload-{{ $upload->name }}" action="{{ route('config.upload', ['name' => $upload->name]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="{{ $upload->name }}">{{ $upload->label }}</label>
                                <input type="hidden" name="old_{{ $upload->name }}" value="{{ $upload->value }}">
                                <input type="file" class="form-control" id="{{ $upload->name }}" name="{{ $upload->name }}">
                                <small> Allowed <strong>{{ strtoupper(config('custom.files.config.'.$upload->name.'.mimes')) }}</strong></small>
                                @error($upload->name)
                                <div class="small mt-1" style="color:#d9534f;">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="tab-pane fade active show" id="application" role="tabpanel" aria-labelledby="application-tab">
                <form action="{{ route('config.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($data['application'] as $app)
                    <div class="form-group">
                        <label for="{{ $app->name }}">{{ $app->label }}</label>
                        <textarea class="form-control" id="{{ $app->name }}" name="name[{{ $app->name }}]" placeholder="Enter value...">{!! old($app->name, $app->value) !!}</textarea>
                    </div>
                    @endforeach
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="market-tab">
                <form action="{{ route('config.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($data['market'] as $market)
                    <div class="form-group">
                        <label for="{{ $market->name }}">{{ $market->label }}</label>
                        <textarea class="form-control" id="{{ $market->name }}" name="name[{{ $market->name }}]" placeholder="Enter value...">{!! old($market->name, $market->value) !!}</textarea>
                    </div>
                    @endforeach
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
</div>
@endsection

@section('jsbody')
<script>
    $('#logo').change(function() {
        $('#upload-logo').submit();
    });
    $('#logo_small').change(function() {
        $('#upload-logo_small').submit();
    });
    $('#notification').change(function() {
        $('#upload-notification').submit();
    });
</script>
@endsection