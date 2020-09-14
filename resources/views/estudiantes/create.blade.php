@extends('layouts.deimaster')

@section('deicontent')

    <form class="form-horizontal" method="POST" action="{{ route('estudiantes.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">@lang('messages.students.nameL')</label>
            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.students.lastNameL')</label>
            <input type="text" name="apellido" class="form-control" id="apellido" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="name">@lang('messages.students.identificationL')</label>
            <input type="number" name="cedula" class="form-control" id="cedula" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>  
        <div class="form-group">
            <label for="name">@lang('messages.students.telephoneL')</label>
            <input type="number" name="telefono" class="form-control" id="telefono" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
        <div class="form-group">
            <label for="grado">@lang('messages.students.levelL')</label>
            <select name="grado" class="form-control" id="grado" aria-describedby="gradoHelp">
                @foreach($data["grados"] as $grado)
                    <option value = {{ $grado->getId() }}>{{ $grado->getNombre() }}</option>
                @endforeach
            </select>
            <small id="gradoHelp" class="form-text text-muted">@lang('messages.students.requiredL')</small>
        </div>
        <button type="submit" class="btn btn-primary">@lang('messages.students.createB')</button>
    </form>
@endsection
