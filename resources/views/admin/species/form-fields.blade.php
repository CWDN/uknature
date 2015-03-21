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
<ul class="image-list">
@for ($i = 0; $i < count($images); $i++) <?php $image = $images[$i]; ?>
<li class="row">
    <div class="col-xs-1">
        <span class="drag-handle glyphicon glyphicon-menu-hamburger"></span>
    </div>
    <div class="col-xs-4">
        <div class="form-group @if ($errors->has('image')) has-error @endif">
            {!! Form::label('image[]', 'Image ' . ($i+1)) !!}
            {!! Form::file('image[]', array('class' => 'form-control')) !!}
            @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
        </div>
    </div>
    <div class="col-xs-2">
        <img class="thumbnail" src="/{{$image->src}}">
    </div>
    <div class="col-xs-4">
        <div class="form-group @if ($errors->has('caption')) has-error @endif">
            {!! Form::hidden('imageid[]', $image->id) !!}
            {!! Form::hidden('imagedelete[]', $image->id, [ 'disabled' => true]) !!}
            {!! Form::label('caption[]', 'Caption') !!}
            {!! Form::text('caption[]', $image->caption, array('class' => 'form-control')) !!}
            @if ($errors->has('caption')) <p class="help-block">{{ $errors->first('caption') }}</p> @endif
        </div>
    </div>
    <div class="col-xs-1">
        <a class="remove-image"><span class="remove glyphicon glyphicon-remove"></span></a>
    </div>
</li>
@endfor
<li class="row new-image new-image-template">
    <div class="col-xs-1">
        <span class="drag-handle glyphicon glyphicon-menu-hamburger"></span>
    </div>
    <div class="col-xs-4">
        <div class="form-group @if ($errors->has('image')) has-error @endif">
            {!! Form::label('image[]', 'New image') !!}
            {!! Form::file('image[]', array('class' => 'form-control', 'disabled' => true)) !!}
            @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
        </div>
    </div>
    <div class="col-xs-2">
        <img class="thumbnail" src="/images/temp-thumbnail.png">
    </div>
    <div class="col-xs-4">
        <div class="form-group @if ($errors->has('caption')) has-error @endif">
            {!! Form::label('caption[]', 'Caption') !!}
            {!! Form::hidden('imageid[]', null, array('disabled' => true )) !!}
            {!! Form::text('caption[]', null, array('class' => 'form-control', 'disabled' => true)) !!}
            @if ($errors->has('caption')) <p class="help-block">{{ $errors->first('caption') }}</p> @endif
        </div>
    </div>
    <div class="col-xs-1">
        <a class="remove-image"><span class="remove glyphicon glyphicon-remove"></span></a>
    </div>
</li>
</ul>
<div class="row">
    <div class="col-xs-12 text-center">
        <button class="btn btn-success add-new-image"><span class="glyphicon glyphicon-plus"></span> Add image</button>
    </div>
</div>
<script src="/js/species-form.js"></script>
