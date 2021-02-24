<div class="form-group{{ $errors->has('user_id') ? ' has-error' : ''}}">
    {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $userid, isset($subscription->user_id) ? $subscription->user_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('video_id') ? ' has-error' : ''}}">
    {!! Form::label('video_id', 'Video Id: ', ['class' => 'control-label']) !!}
    {!! Form::text('video_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('video_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('watched_till') ? ' has-error' : ''}}">
    {!! Form::label('watched_till', 'Watched Till: ', ['class' => 'control-label']) !!}
    {!! Form::date('watched_till', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('watched_till', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
