<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, array('class' => 'form-control')) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('binomial')) has-error @endif">
    {!! Form::label('binomial', 'Binomial') !!}
    {!! Form::text('binomial', null, array('class' => 'form-control')) !!}
    @if ($errors->has('binomial')) <p class="help-block">{{ $errors->first('binomial') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
    @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('category')) has-error @endif">
    {!! Form::label('category', 'Category') !!}
    {!! Form::select('category', $categories, isset($item) ? $item->category->id : null, array('class' => 'form-control')) !!}
    @if ($errors->has('category')) <p class="help-block">{{ $errors->first('category') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('slug')) has-error @endif">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, array('class' => 'form-control')) !!}
    @if ($errors->has('slug')) <p class="help-block">{{ $errors->first('slug') }}</p> @endif
</div>