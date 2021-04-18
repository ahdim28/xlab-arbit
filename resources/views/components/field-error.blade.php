@if ($errors->has($field))
<small class="error invalid-feedback">{!! $errors->first($field) !!}</small>
@endif
