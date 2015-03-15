@extends('templates.frontend')

@section('content')

    <h1>{{$species->name}}</h1>
    <p>{{$species->binomial}}</p>
    <p>{{$species->description}}</p>

@endsection
