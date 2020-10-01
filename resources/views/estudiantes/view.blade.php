@extends('layouts.deimaster')

@section('deicontent')
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">@lang('messages.students.idT')</th>
                <th scope="col">@lang('messages.students.nameT')</th>
                <th scope="col">@lang('messages.students.lastNameT')</th>
                <th scope="col">@lang('messages.students.identificationT')</th>
                <th scope="col">@lang('messages.students.telephoneT')</th>
                <th scope="col">@lang('messages.students.levelT')</th>
                <th scope="col">@lang('messages.students.actionsT')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data['estudiantes'] as $estudiante )
                <tr>
                    <th scope="row">
                        <a href="{{route('estudiantes.edit', $estudiante)}}">
                            {{ $estudiante->getId() }}
                        </a>
                    </th>
                    <td class="inner-table">{{ $estudiante->getNombre() }}</td>
                    <td class="inner-table">{{ $estudiante->getApellido() }}</td>
                    <td class="inner-table">{{ $estudiante->getCedula() }}</td>
                    <td class="inner-table">{{ $estudiante->getTelefono() }}</td>
                    <td class="inner-table">{{ $estudiante->grado->getNombre() }}</td>
                    <td>
                        
                        <form method="POST" action="{{ route('estudiantes.destroy', $estudiante) }}">
                            {{ csrf_field() }} {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-sm">@lang('messages.students.btnDelete')</button>
                        </form>
                        <td>
                            <a href="{{route('estudiantes.edit', $estudiante)}}" class="btn btn-warning btn-sm">@lang('messages.students.btnUpdate')</a>
                        </td>

                    </td>
                </tr>
            @empty
                <div class="alert alert-primary" role="alert">
                    @lang('messages.students.studentsE')
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $data['estudiantes']->links() }}
@endsection
