@extends('layouts.master')

@section("title", $data["title"])

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