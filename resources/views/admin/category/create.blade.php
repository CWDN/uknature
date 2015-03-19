@extends('templates.admin')

@section('content')

{!! Form::model(null, array('route' => array('admin.category.store'), 'method' => 'POST')) !!}

    @include('admin.category.form-fields')

    <a class="btn btn-default" href="{{route('admin.category.index')}}">back</a>
    {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop
