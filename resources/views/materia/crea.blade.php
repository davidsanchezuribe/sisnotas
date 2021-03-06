@extends('layouts.deimaster')

@section('deicontent')

<form class="form-horizontal" method="POST" action="{{ route('materia.save') }}">
    @csrf
    <div class="form-group">
        <label for="name">@lang('messages.courses.nameL')</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
        <small id="nameHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
    </div>
    <div class="form-group">
        <label for="teacher">@lang('messages.courses.teacherL')</label>
        <select name="teacher" class="form-control" id="teacher">
            <option value = 0>---</option>
            @foreach($data["teachers"] as $teacher)
                <option value = {{ $teacher->getId() }}>{{ $teacher->getNombre() }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="grado">@lang('messages.courses.levelL')</label>
        <select name="grado" class="form-control" id="grado" aria-describedby="gradoHelp">
            @foreach($data["grados"] as $grado)
                <option value = {{ $grado->getId() }}>{{ $grado->getNombre() }}</option>
            @endforeach
        </select>
        <small id="gradoHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
    </div>
    <button type="submit" class="btn btn-primary">@lang('messages.courses.createB')</button>
</form>
@endsection
