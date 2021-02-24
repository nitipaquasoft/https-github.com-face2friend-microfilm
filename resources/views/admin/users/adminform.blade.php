<div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
    {!! Form::label('username', 'Username: ', ['class' => 'control-label']) !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
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

<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : ''}}">
    {!! Form::label('status', 'Status: ', ['class' => 'control-label']) !!}
    {!! Form::radio('status','0' ,['class' => 'form-control', 'required' => 'required']) !!} Unactive
    {!! Form::radio('status','1' ,['class' => 'form-control', 'required' => 'required']) !!} Active
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}" style="visibility:hidden;">
    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
    <!--{!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control']) !!}-->
    <select class="form-control"  name="roles"><option value="Admin" selected>Admin</option></select>
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
