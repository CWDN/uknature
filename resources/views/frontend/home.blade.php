@extends('templates.frontend')

@section('content')

<h1>home page</h1>

    <h2>recently updated</h2>
    <ul>
        @foreach($recent as $species)
            <li><a href="{{route('species', [$species->category->slug, $species->slug])}}">{{$species->name}}</a></li>
        @endforeach
    </ul>

@endsection
