@extends('layouts.deimaster')

@section('deicontent')
<div class="text-right">
    <p><strong>@lang('messages.exams.levelL')</strong>{{$data['grado']}}</p>
    <p><strong>@lang('messages.exams.courseL')</strong>{{$data['nombre']}}</p>
    <p><strong>@lang('messages.exams.teacherL')</strong>{{$data['profesor']}}</p>
</div>
<table class="table">
  <thead>
    <tr>
      {{--<th scope="col">@lang('messages.exams.idT')</th>--}}
      <th scope="col">@lang('messages.exams.descT')</th>
      <th scope="col">@lang('messages.exams.dateT')</th>
      <th scope="col">@lang('messages.exams.percentT')</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data['evaluaciones'] as $evaluacion)
    <tr>
      {{--<th scope="row">{{ $evaluacion -> getId() }}</th>--}}
      <td>{{ $evaluacion -> getDesc() }}</td>
      <td>{{ $evaluacion -> getFecha() }}</td>
      <td>{{ $evaluacion -> getPorcentaje() }}%</td>        
    </tr>
    @endforeach
  </tbody>
</table>
<form class="form-horizontal" method="POST" action="{{ route('evaluacion.save') }}">
    @csrf
    @if ($data["totalEvaluado"] < 100)
      <input hidden type="text" name="materia_id" value="{{$data['id']}}">
      <input hidden type="text" name="totalEvaluado" value="{{$data['totalEvaluado']}}">
      <div class="form-group">
        <label for="desc">@lang('messages.exams.descL')</label>
        <input type="text" name="desc" class="form-control" id="desc" aria-describedby="descHelp">
        <small id="descHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
      </div>
      <div class="form-group">
        <label for="fecha">@lang('messages.exams.dateL')</label>
        <input type="date" name="fecha" class="form-control" id="fecha" aria-describedby="fechaHelp">
        <small id="fechaHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
      </div>
      <div class="form-group">
        <label for="porcentaje">@lang('messages.exams.percL')</label>
        <div class="input-group">
          <input type="text" name="porcentaje" class="form-control" id="porcentaje" aria-describedby="porcentajeHelp">
          <div class="input-group-append">
            <div class="input-group-text">%</div>
          </div>
        </div>
        <small id="porcentajeHelp" class="form-text text-muted">@lang('messages.courses.requiredL')</small>
      </div>
    @endif
      <button type="submit" name="action" value="back" class="btn btn-secundary my-1">@lang('messages.exams.coursesB')</button>
    @if ($data["totalEvaluado"] < 100)
      <button type="submit" name="action" value="add" class="btn btn-primary my-1">@lang('messages.exams.addB')</button>
    @else
      <p class="text-center">@lang('messages.exams.fullL')</p>
    @endif
</form>
@endsection