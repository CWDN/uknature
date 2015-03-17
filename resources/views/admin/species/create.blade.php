@extends('templates.admin')

@section('content')

{!! Form::model(null, array('route' => array('admin.species.store'), 'method' => 'POST')) !!}

    @include('admin.species.form-fields')

    {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop
