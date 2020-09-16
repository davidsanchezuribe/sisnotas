@extends('layouts.deimaster')

@section('deicontent')

<form class="form-horizontal" method="POST" action="{{ route('grado.save') }}">
    @csrf
    <div class="form-group">
        <label for="name">@lang('messages.level.nameL')</label>
        <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nameHelp">
        <small id="nameHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
    </div>
    <button type="submit" class="btn btn-primary">@lang('messages.courses.createB')</button>
</form>
@endsection
