@extends('client.layouts.app')
@section('content')


@foreach($services as $ser)

<div style="margin-top: 100px; display: flex; padding: 20px;">
    <a href="{{ route('service.details', $ser->slug) }}" style="padding: 20px;">{{ @$ser->title }}</a>
</div>
@endforeach
@endsection