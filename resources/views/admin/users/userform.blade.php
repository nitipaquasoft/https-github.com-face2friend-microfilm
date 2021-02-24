
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
    @php
    $passwordOptions = ['class' => 'form-control'];
    if ($formMode === 'create') {
    $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
    }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('age') ? ' has-error' : ''}}">
    {!! Form::label('age', 'Age: ', ['class' => 'control-label']) !!}
    {!! Form::text('age', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group{{ $errors->has('phone') ? ' has-error' : ''}}">
    {!! Form::label('phone', 'Phone: ', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('alt_phone') ? ' has-error' : ''}}">
    {!! Form::label('alt_phone', 'Alt Phone: ', ['class' => 'control-label']) !!}
    {!! Form::text('alt_phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('alt_phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : ''}}">
    {!! Form::label('address', 'Address: ', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('address_line2') ? ' has-error' : ''}}">
    {!! Form::label('address_line2', 'Address Line2: ', ['class' => 'control-label']) !!}
    {!! Form::text('address_line2', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('address_line2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('city') ? ' has-error' : ''}}">
    {!! Form::label('city', 'City: ', ['class' => 'control-label']) !!}
    {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('state') ? ' has-error' : ''}}">
    {!! Form::label('state', 'State: ', ['class' => 'control-label']) !!}
    {!! Form::text('state', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('country') ? ' has-error' : ''}}">
    {!! Form::label('country', 'Country: ', ['class' => 'control-label']) !!}
    {!! Form::text('country', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('pin_code') ? ' has-error' : ''}}">
    {!! Form::label('pin_code', 'Pin Code: ', ['class' => 'control-label']) !!}
    {!! Form::text('pin_code', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('pin_code', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('distributer') ? ' has-error' : ''}}">
    {!! Form::label('distributer', 'Distributer: ', ['class' => 'control-label']) !!}
    {!! Form::text('distributer', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('distributer', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('dob') ? ' has-error' : ''}}">
    {!! Form::label('dob', 'Dob: ', ['class' => 'control-label']) !!}
    {!! Form::date('dob', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}" style="visibility:hidden;">
    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
    <!--{!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control']) !!}-->
    <select class="form-control"  name="roles"><option value="user" selected>User</option></select>
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

