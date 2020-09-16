@extends('layouts.deimaster')

@section('deicontent')

<form class="form-horizontal" method="POST" action="{{ route('grado.saveUpdate',$data['level']) }}">
    @csrf
    <div class="form-group">
        <label for="name">@lang('messages.courses.nameL')</label>
        <input type="text" name="nombre" class="form-control" value="{{$data['level']['nombre']}}"  id="nombre" aria-describedby="nameHelp">
        <small id="nameHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
    </div>
   
    <button type="submit" class="btn btn-primary">@lang('messages.level.btnActualizar')</button>
</form>
@endsection
