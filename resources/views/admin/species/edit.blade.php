@extends('templates.admin')

@section('content')

{!! Form::model($item, array('route' => array('admin.species.update', $item->id), 'method' => 'PUT', 'files' => true)) !!}

    @include('admin.species.form-fields')

    <a class="btn btn-default" href="{{route('admin.species.index')}}">back</a>
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop
