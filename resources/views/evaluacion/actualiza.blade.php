@extends('layouts.deimaster')

@section('deicontent')
<div class="text-right">
    <p><strong>@lang('messages.exams.levelL')</strong>{{$data['grado']}}</p>
    <p><strong>@lang('messages.exams.courseL')</strong>{{$data['nombre']}}</p>
    <p><strong>@lang('messages.exams.teacherL')</strong>{{$data['profesor']}}</p>
</div>
<form class="form-horizontal" method="POST" action="{{ route('evaluacion.updateordelete') }}">
    @csrf
    <input hidden name="materia_id" value="{{ $data['id'] }}">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">@lang('messages.exams.idT')</th>
        <th scope="col">@lang('messages.exams.descT')</th>
        <th scope="col">@lang('messages.exams.dateT')</th>
        <th scope="col">@lang('messages.exams.percentT')</th>
        <th scope="col">@lang('messages.exams.deleteT')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['evaluaciones'] as $evaluacion)
        <tr>
        <th scope="row">{{ $evaluacion -> getId() }}</th>
        <td><input type="text" name="{{ 'desc' . $evaluacion -> getId() }}" value="{{ $evaluacion -> getDesc() }}" style="width:130px;"/></td>
        <td><input type="date" name="{{ 'fecha' . $evaluacion -> getId() }}" value="{{ $evaluacion -> getFecha() }}" style="width:150px;"/></td>
        <td><input type="text" name="{{ 'porcentaje' . $evaluacion -> getId() }}" value="{{ $evaluacion -> getPorcentaje() }}" style="width:30px;" /> %</td>
        <td><button type="submit" name="action" value="{{ 'd' . $evaluacion -> getId() }}" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></button></td>        
        </tr>
        @endforeach
    </tbody>

    </table>
    <button type="submit" name="action" value="back" class="btn btn-secundary my-1">@lang('messages.exams.coursesB')</button>
    <button type="submit" name="action" value="add" class="btn btn-secundary my-1">@lang('messages.exams.addB')</button>
    <button type="reset" class="btn btn-secundary my-1">@lang('messages.exams.resetB')</button>    
    <button type="submit" name="action" value="update" class="btn btn-primary my-1">@lang('messages.exams.updateB')</button>             
</form
@endsection