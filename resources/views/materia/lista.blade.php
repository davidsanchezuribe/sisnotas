@extends('layouts.deimaster')

@section('deicontent')
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
        <p>No se encontraron productos
    @endforelse
  </tbody>
</table>
 
{{ $data['materias']->links() }}
@endsection