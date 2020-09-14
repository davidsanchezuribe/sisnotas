@extends('layouts.deimaster')

@section('deicontent')

    <form class="form-horizontal" method="POST" action="{{ route('profesores.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">@lang('messages.teachers.nameL')</label>
            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.teachers.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.teachers.lastNameL')</label>
            <input type="text" name="apellido" class="form-control" id="apellido" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.teachers.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.teachers.identificationL')</label>
            <input type="number" name="cedula" class="form-control" id="cedula" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.teachers.requiredL')</small>
        </div>  
        <button type="submit" class="btn btn-primary">@lang('messages.teachers.createB')</button>
    </form>
@endsection
