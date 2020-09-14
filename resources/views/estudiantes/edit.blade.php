@extends('layouts.deimaster')

@section('deicontent')

    <form class="form-horizontal" method="POST" action="{{ route('estudiantes.update', $data['estudiante']->getId()) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">@lang('messages.students.nameL')</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $data['estudiante']->getNombre() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.students.lastNameL')</label>
            <input type="text" name="apellido" class="form-control" id="apellido" value="{{ $data['estudiante']->getApellido() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.students.identificationL')</label>
            <input type="text" name="cedula" class="form-control" id="cedula" value="{{ $data['estudiante']->getCedula() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>  
        <div class="form-group">
            <label for="name">@lang('messages.students.telephoneL')</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ $data['estudiante']->getTelefono() }}" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
       
        <button type="submit" class="btn btn-primary">@lang('messages.students.updateB')</button>
    </form>
@endsection
