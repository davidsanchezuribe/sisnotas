@extends('layouts.deimaster')

@section('deicontent')
<form class="form-horizontal" method="POST" action="{{ route('materia.query') }}">
  @csrf
  <div class="form-group">
      <label for="teacher">@lang('messages.courses.teacherL')</label>
      <select name="teacher" class="form-control" id="teacher">
          <option value=0>---</option>
          @foreach($data["teachers"] as $teacher)
              <option value = {{ $teacher->getId() }} {{ $data['teacher_id'] == $teacher->getId() ? 'selected' : '' }}>
                {{ $teacher->getNombre() }}
                </option>
          @endforeach
      </select>
  </div>
  <div class="form-group">
      <label for="level">@lang('messages.courses.levelL')</label>
      <select name="level" class="form-control" id="level">
          <option value = 0>---</option>
          @foreach($data["levels"] as $level)
              <option value = {{ $level->getId() }} {{ $data['level_id'] == $level->getId() ? 'selected' : '' }}>
                {{ $level->getNombre() }}
              </option>
          @endforeach
      </select>
  </div>
  <button type="reset" class="btn btn-secondary my-3">
    @lang('messages.courses.resetB')
  </button>
  <button type="submit" class="btn btn-primary my-3">
    @lang('messages.courses.filterB')
  </button>
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">@lang('messages.courses.idT')</th>
      <th scope="col">@lang('messages.courses.nameT')</th>
      <th scope="col">@lang('messages.courses.levelT')</th>
      <th scope="col">@lang('messages.courses.teacherT')</th>
    </tr>
  </thead>
  <tbody>
    @forelse($data['materias'] as $materia)
    <tr>
        <th scope="row"><a href="{{ route('materia.show', ['id' => $materia -> id ]) }}">{{ $materia -> id }}</a></th>
        <td>{{ $materia -> nombre }}</td>
        <td>{{ $materia -> grado -> nombre }}</td>
        <td>{{ $materia -> profesor ? $materia -> profesor -> nombre : __('messages.courses.nullTeacherT') }}</td>        
    </tr>
    @empty
    <div class="alert alert-primary" role="alert">
    @lang('messages.courses.coursesE')
    </div>
    @endforelse
  </tbody>
</table>
 
{{ $data['materias']->links() }}
@endsection