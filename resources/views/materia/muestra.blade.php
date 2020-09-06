@extends('layouts.deimaster')

@section('deicontent')
<h2 class="text-center">@lang('messages.courses.idL'){{ $data['id'] }}</h2>
<form class="form-horizontal" method="POST" action="{{ route('materia.updateordelete') }}">
    @csrf
    <input type="hidden" name="id" value={{ $data['id'] }} />
    <div class="form-group">
        <label for="name">@lang('messages.courses.nameL')</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{ $data['nombre'] }}">
        <small id="nameHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
    </div>
    <div class="form-group">
        <label for="teacher">@lang('messages.courses.teacherL')</label>
        <select name="teacher" class="form-control" id="teacher">
            <option value = 0>---</option>
            @foreach($data["teachers"] as $teacher)
                <option value = {{ $teacher->getId() }} {{ $teacher->getId() === $data['profesor_id'] ? 'selected' : '' }}>
                    {{ $teacher->getNombre() }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="grado">@lang('messages.courses.levelL')</label>
        <select name="grado" class="form-control" id="grado" disabled>
            @foreach($data["grados"] as $grado)
                <option value = {{ $grado->getId() }} {{ $grado->getId() === $data['grado_id'] ? 'selected' : '' }}>
                    {{ $grado->getNombre() }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" name="action" value="delete" class="btn btn-danger">@lang('messages.courses.deleteB')</button>
    <button type="reset" class="btn btn-secundary">@lang('messages.courses.resetB')</button>
    <button type="submit" name="action" value="update" class="btn btn-primary">@lang('messages.courses.updateB')</button>
</form>    
@endsection