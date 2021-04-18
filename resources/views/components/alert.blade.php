@php
    $success = session('success');
    $failed = session('failed');
    $error = session('error');
    $warning = session('warning');
    $info = session('info');
    $status = session('status');
    if ($success) {
        $title = 'Success';
        $color = 'success';
        $alert = $success;
    } elseif($failed) {
        $title = 'Failed';
        $color = 'danger';
        $alert = $failed;
    } elseif($error) {
        $title = 'Error';
        $color = 'danger';
        $alert = $error;
    } elseif($warning) {
        $title = 'Warning';
        $color = 'warning';
        $alert = $warning;
    } elseif($info) {
        $title = 'Info';
        $color = 'info';
        $alert = $info;
    } elseif($status) {
        $title = 'Info';
        $color = 'info';
        $alert = $status;
    }
@endphp
@if ($success || $failed || $error || $warning || $info || $status)
<div class="callout callout-{{ $color }}">
    <h5>{{ $title }}</h5>

    <p>{{ $alert }}</p>
</div>
@endif
