@extends('layouts.deimaster')

@section('deicontent')
<div class="text-right">
    <p><strong>@lang('messages.exams.levelL')</strong>{{$data['grado']}}</p>
    <p><strong>@lang('messages.exams.courseL')</strong>{{$data['nombre']}}</p>
    <p><strong>@lang('messages.exams.teacherL')</strong>{{$data['profesor']}}</p>
</div>
<form class="form-horizontal" method="POST" action="{{ route('nota.update') }}">
    @csrf
    <input hidden name="materia_id" value="{{ $data['id'] }}">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">@lang('messages.grades.studentCoursesL')</th>
            @foreach ($data['descEvaluaciones'] as $desc)
                <th scope="col" class="text-center">{{$desc}}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < count($data['idEstudiantes']); $i++)
            <tr>
                <th scope="row">{{$data['nombreEstudiantes'][$i]}}</th>
                @for ($j = 0; $j < count($data['idEvaluaciones']); $j++)
                <td class="text-center">
                    <input 
                        type="text" 
                        name="{{ 's' . $data['idEstudiantes'][$i] . 'e' . $data['idEvaluaciones'][$j]}}"
                        value="{{ $data['notas'][$data['idEstudiantes'][$i]][$data['idEvaluaciones'][$j]] }}" 
                        style="width:35px;"
                        class="text-center"
                    />
                </td>
                @endfor
            </tr>
        @endfor
        </tbody>
    </table>
    <button type="submit" name="action" value="back" class="btn btn-secundary my-1">@lang('messages.grades.coursesB')</button>
    <button type="reset" class="btn btn-secundary my-1">@lang('messages.grades.resetB')</button>
    <button type="submit" name="action" value="report" class="btn btn-secundary my-1">@lang('messages.grades.reportB')</button>                  
    <button type="submit" name="action" value="update" class="btn btn-primary my-1">@lang('messages.grades.updateB')</button>              
</form>

@endsection