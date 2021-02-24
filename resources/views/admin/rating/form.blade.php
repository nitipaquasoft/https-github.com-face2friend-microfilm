<div class="form-group{{ $errors->has('user_id') ? ' has-error' : ''}}">
    {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $userid, isset($rating->user_id) ? $rating->user_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('content_id') ? ' has-error' : ''}}">
    {!! Form::label('content_id', 'Content Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('content_id', $contentid, isset($rating->content_id) ? $rating->content_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('rating') ? ' has-error' : ''}}">
    {!! Form::label('rating', 'Rating: ', ['class' => 'control-label']) !!}
    {!! Form::text('rating', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('comment') ? ' has-error' : ''}}">
    {!! Form::label('comment', 'Comment: ', ['class' => 'control-label']) !!}
    {!! Form::text('comment', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
