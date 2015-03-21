@extends('templates.admin')

@section('content')

    <h2>Edit Species</h2>

{!! Form::model($item, array('route' => array('admin.species.update', $item->id), 'method' => 'PUT', 'files' => true)) !!}

    @include('admin.species.form-fields')

    <div class="form-group text-right">
        <a class="btn btn-default" href="{{route('admin.species.index')}}">Cancel</a>
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>

{!! Form::close() !!}

@stop
