@extends('templates.admin')

@section('content')

{!! Form::model($item, array('route' => array('admin.species.update', $item->id), 'method' => 'PUT')) !!}

    @include('admin.species.form-fields')

    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop
