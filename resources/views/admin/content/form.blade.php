<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('episode') ? ' has-error' : ''}}">
    {!! Form::label('episode', 'Episode: ', ['class' => 'control-label']) !!}
    {!! Form::text('episode', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('episode', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('timelength') ? ' has-error' : ''}}">
    {!! Form::label('timelength', 'Time Length: ', ['class' => 'control-label']) !!}
    {!! Form::text('timelength', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('timelength', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('cost_per_stream') ? ' has-error' : ''}}">
    {!! Form::label('cost_per_stream', 'Cost per Stream: ', ['class' => 'control-label']) !!}
    {!! Form::text('cost_per_stream', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('cost_per_stream', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group{{ $errors->has('release_date') ? ' has-error' : ''}}">
    {!! Form::label('release_date', 'Release Date: ', ['class' => 'control-label']) !!}
    {!! Form::date('release_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('release_date', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('distributer') ? ' has-error' : ''}}">
    {!! Form::label('distributer', 'Distributer: ', ['class' => 'control-label']) !!}
    {!! Form::text('distributer', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('distributer', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('censor_rating') ? ' has-error' : ''}}">
    {!! Form::label('censor_rating', 'Censor Rating: ', ['class' => 'control-label']) !!}
    {!! Form::text('censor_rating', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('censor_rating', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
