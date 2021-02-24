<div class="form-group{{ $errors->has('user_id') ? ' has-error' : ''}}">
    {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $userid, isset($profile->user_id) ? $profile->user_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
