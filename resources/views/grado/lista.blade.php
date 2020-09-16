@extends('layouts.deimaster')

@section('deicontent')
<table class="table">
  <thead>
    <tr>
      <th scope="col">@lang('messages.level.idT')</th>
      <th scope="col">@lang('messages.level.nameT')</th>
     
      <th scope="col">@lang('messages.level.optionsT')</th>
    </tr>
  </thead>
  <tbody>
  @forelse($data['levels'] as $level)
    <tr>
        <th scope="row"><a>{{ $level -> id }}</a></th>
        <td>{{ $level -> nombre}}</td>
        <td><div class="row">
        <a type="button" name="action" value="schedule" class="btn btn-primary mt-1" href="/grado/delete/{{$level->getId()}}">@lang('messages.level.btnEliminar')</a>
        <a type="button" name="action" value="schedule" class="btn btn-primary mt-1" href="/grado/update/{{$level->getId()}}" style="margin-left:10px">@lang('messages.level.btnActualizar')</a>
        </div></td>        
    </tr>
    @empty

    @endforelse

  </tbody>
</table>

@endsection
