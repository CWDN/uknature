@extends('templates.admin')

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Species
            <a class="btn btn-primary btn-xs pull-right" href="{{ route('admin.species.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Species</a>
        </div>
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
                            <a class="btn btn-xs btn-default" href="{{ route('admin.species.edit', $value->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop