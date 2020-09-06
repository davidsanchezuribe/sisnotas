@extends('layouts.deimaster')

@section('deicontent')
<p class="font-weight-light text-center">{{ $data['errorMsg'] }}</p>
<p class="font-weight-light text-center">@lang('messages.util.modelNotFound.lookInstead')</p>
<img src="{{ $data['imgUrl'] }}" class="img-fluid mx-auto d-block" alt="Responsive image">
@endsection