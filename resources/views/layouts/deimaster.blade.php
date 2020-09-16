@extends('layouts.master')

@section("title", $data["title"])
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('materia.list')}}">
    <img src="{{ asset('img/logo/logo_small.png') }}" style="height: 50px;"/>
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @lang('messages.navbar.coursesL')
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('materia.create')}}">@lang('messages.navbar.courseCreateL')</a>
            <a class="dropdown-item" href="{{route('materia.list')}}">@lang('messages.navbar.courseListL')</a>
            <a class="dropdown-item" href="{{route('materia.show', ['id' => 20])}}">@lang('messages.navbar.courseShowL')</a>
        </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @lang('messages.navbar.teachersL')
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('profesores.create')}}">@lang('messages.navbar.teacherCreateL')</a>
              <a class="dropdown-item" href="{{route('profesores.index')}}">@lang('messages.navbar.teacherListL')</a>
          </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @lang('messages.navbar.studentsL')
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('estudiantes.create')}}">@lang('messages.navbar.studentCreateL')</a>
              <a class="dropdown-item" href="{{route('estudiantes.index')}}">@lang('messages.navbar.studentListL')</a>
          </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @lang('messages.navbar.evaluationsL')
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('evaluacion.create', ['id' => 20])}}">@lang('messages.navbar.evaluationCreateL')</a>
              <a class="dropdown-item" href="{{route('evaluacion.update', ['id' => 20])}}">@lang('messages.navbar.evaluationUpdateL')</a>
          </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @lang('messages.navbar.gradesL')
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('nota.manage', ['id' => 20])}}">@lang('messages.navbar.manageGradesL')</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @lang('messages.navbar.levelL')
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('grado.lista')}}">@lang('messages.navbar.levelListL')</a>
          <a class="dropdown-item" href="{{route('grado.crear')}}">@lang('messages.navbar.levelCreateL')</a>

        </div>
       
      </li>

    </ul>
  </div>
</nav>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('util.message')
                <div class="card">
                    <div class="card-header">@yield('title','Home Page')</div>
                    <div class="card-body">
                        @yield('deicontent')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
