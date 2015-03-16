@extends('templates.frontend')

@section('content')

<h1>home page</h1>

    <h2>recently updated</h2>
    <ul>
        @foreach($recent as $species)
            <?php $image = $species->images->first(); ?>
            <li>
                <a href="{{route('species', [$species->category->slug, $species->slug])}}">
                    {{$species->name}}
                    @if($image)
                        <img src="{{$image->src}}" alt="{{$image->caption}}">
                    @endif
                </a>
            </li>
        @endforeach
    </ul>

@endsection
