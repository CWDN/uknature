@extends('templates.frontend')

@section('content')

    <h1>{{$category->name}}</h1>

    <ul>
    @foreach($category->species as $species)
        <li><a href="{{route('species', [$category->slug, $species->slug])}}">{{$species->name}}</a></li>
    @endforeach
    </ul>

@endsection
