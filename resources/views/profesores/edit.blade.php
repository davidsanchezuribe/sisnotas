@extends('layouts.deimaster')

@section('deicontent')

    <form class="form-horizontal" method="POST" action="{{ route('profesores.update', $data['profesor']->getId()) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">@lang('messages.teachers.nameL')</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $data['profesor']->getNombre() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.teachers.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.teachers.lastNameL')</label>
            <input type="text" name="apellido" class="form-control" id="apellido" value="{{ $data['profesor']->getApellido() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.teachers.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.teachers.identificationL')</label>
            <input type="text" name="cedula" class="form-control" id="cedula" value="{{ $data['profesor']->getCedula() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.teachers.requiredL')</small>
        </div>  
            
        <button type="submit" class="btn btn-primary">@lang('messages.teachers.updateB')</button>
    </form>
@endsection
