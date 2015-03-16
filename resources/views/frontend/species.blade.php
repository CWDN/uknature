@extends('templates.frontend')

@section('content')

    <h1>{{$species->name}}</h1>
    <p>{{$species->binomial}}</p>
    <p>{{$species->description}}</p>

    @foreach($species->images as $image)
        <img src="{{asset($image->src)}}" alt="{{$image->caption}}">
    @endforeach

@endsection
