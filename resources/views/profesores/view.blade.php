@extends('layouts.deimaster')

@section('deicontent')
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">@lang('messages.teachers.idT')</th>
                <th scope="col">@lang('messages.teachers.nameT')</th>
                <th scope="col">@lang('messages.teachers.lastNameT')</th>
                <th scope="col">@lang('messages.teachers.identificationT')</th>
                <th scope="col">@lang('messages.teachers.actionsT')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data['profesores'] as $profesor )
                <tr>
                    <th scope="row">
                        <a href="{{route('profesores.edit', $profesor)}}">
                            {{ $profesor->getId() }}
                        </a>
                    </th>
                    <td class="inner-table">{{ $profesor->getNombre() }}</td>
                    <td class="inner-table">{{ $profesor->getApellido() }}</td>
                    <td class="inner-table">{{ $profesor->getCedula() }}</td>
                    <td>
                        
                        <form method="POST" action="{{ route('profesores.destroy', $profesor) }}">
                            {{ csrf_field() }} {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <td>
                            <a href="{{route('profesores.edit', $profesor)}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>

                    </td>
                </tr>
            @empty
                <div class="alert alert-primary" role="alert">
                    @lang('messages.teachers.teachersE')
                </div>
            @endforelse
        </tbody>
    </table>
    {{ $data['profesores']->links() }}
@endsection
