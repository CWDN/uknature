@extends('templates.admin')

@section('content')

    <h2>Add Species</h2>

{!! Form::model(null, array('route' => array('admin.species.store'), 'method' => 'POST', 'files' => true)) !!}

    @include('admin.species.form-fields')

    <div class="form-group text-right">
        <a class="btn btn-default" href="{{route('admin.species.index')}}">Cancel</a>
        {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
    </div>

{!! Form::close() !!}

@stop
