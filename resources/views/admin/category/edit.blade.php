@extends('templates.admin')

@section('content')

{!! Form::model($item, array('route' => array('admin.category.update', $item->id), 'method' => 'PUT')) !!}

    @include('admin.category.form-fields')

    <a class="btn btn-default" href="{{route('admin.category.index')}}">back</a>
    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop
