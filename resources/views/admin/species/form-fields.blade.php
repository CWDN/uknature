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
<hr />
@for ($i = 0; $i < count($images); $i++) <?php $image = $images[$i]; ?>
<div class="row">
    <div class="col-xs-4">
        <div class="form-group @if ($errors->has('image')) has-error @endif">
            {!! Form::label('images[]', 'Image ' . ($i+1)) !!}
            {!! Form::file('images[]', null, array('class' => 'form-control')) !!}
            @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
        </div>
    </div>
    <div class="col-xs-2">
        <img class="thumbnail" src="/{{$image->src}}">
    </div>
    <div class="col-xs-6">
        <div class="form-group @if ($errors->has('caption')) has-error @endif">
            {!! Form::hidden('imageids[]', $image->id) !!}
            {!! Form::label('captions[]', 'Caption') !!}
            {!! Form::text('captions[]', $image->caption, array('class' => 'form-control')) !!}
            @if ($errors->has('caption')) <p class="help-block">{{ $errors->first('caption') }}</p> @endif
        </div>
    </div>
</div>
    <hr />
@endfor
<div class="row">
    <div class="col-xs-6">
        <div class="form-group @if ($errors->has('image')) has-error @endif">
            {!! Form::label('images[]', 'New image') !!}
            {!! Form::file('images[]', null, array('class' => 'form-control')) !!}
            @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group @if ($errors->has('caption')) has-error @endif">
            {!! Form::label('captions[]', 'Caption') !!}
            {!! Form::hidden('imageids[]', null) !!}
            {!! Form::text('captions[]', null, array('class' => 'form-control')) !!}
            @if ($errors->has('caption')) <p class="help-block">{{ $errors->first('caption') }}</p> @endif
        </div>
    </div>
</div>
<hr />
