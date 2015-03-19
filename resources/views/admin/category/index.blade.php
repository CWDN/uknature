@extends('templates.admin')

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Categories
            <a class="btn btn-primary btn-xs pull-right" href="{{ route('admin.category.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Category</a>
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
                            <a class="btn btn-default btn-xs" href="{{ route('admin.category.edit', $value->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop