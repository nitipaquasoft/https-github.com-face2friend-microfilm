<div class="form-group{{ $errors->has('user_id') ? ' has-error' : ''}}">
    {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $userid, isset($subscription->user_id) ? $subscription->user_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('plan_id') ? ' has-error' : ''}}">
    {!! Form::label('plan_id', 'Plan Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('plan_id', $planid, isset($subscription->plan_id) ? $subscription->plan_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('valid_till') ? ' has-error' : ''}}">
    {!! Form::label('valid_till', 'valid Till: ', ['class' => 'control-label']) !!}
    {!! Form::date('valid_till', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('valid_till', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
