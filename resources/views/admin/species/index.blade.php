@extends('templates.admin')

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <a class="btn btn-primary" href="{{ route('admin.species.create') }}">New Species</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <a class="btn btn-small btn-info" href="{{ route('admin.species.edit', $value->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop