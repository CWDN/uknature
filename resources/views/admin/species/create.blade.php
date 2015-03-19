@extends('templates.admin')

@section('content')

{!! Form::model(null, array('route' => array('admin.species.store'), 'method' => 'POST', 'files' => true)) !!}

    @include('admin.species.form-fields')

    <a class="btn btn-default" href="{{route('admin.species.index')}}">back</a>
    {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop
