<div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
    {!! Form::textarea('address', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::textarea('email', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('footer_tagline') ? 'has-error' : ''}}">
    {!! Form::label('footer_tagline', 'Footer Tagline', ['class' => 'control-label']) !!}
    {!! Form::textarea('footer_tagline', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('footer_tagline', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('contact') ? 'has-error' : ''}}">
    {!! Form::label('contact', 'Contact', ['class' => 'control-label']) !!}
    {!! Form::textarea('contact', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
</div>
<?php
if (isset($configuration->logo))
    echo "<img width='100' src=" . url('/' . $configuration->logo) . ">";
?>
<div class="form-group{{ $errors->has('logo') ? 'has-error' : ''}}">
    {!! Form::label('logo', 'Logo', ['class' => 'control-label']) !!}
    {!! Form::file('logo', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::textarea('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('dashboard_title') ? 'has-error' : ''}}">
    {!! Form::label('dashboard_title', 'Dashboard Title', ['class' => 'control-label']) !!}
    {!! Form::textarea('dashboard_title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('dashboard_title', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
