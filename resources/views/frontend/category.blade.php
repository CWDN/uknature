@extends('templates.frontend')

@section('content')

    <h1>{{$category->name}}</h1>

    @foreach($category->species as $species)

        <a href="{{route('species', [$category->slug, $species->slug])}}">{{$species->name}}</a>

    @endforeach

@endsection
