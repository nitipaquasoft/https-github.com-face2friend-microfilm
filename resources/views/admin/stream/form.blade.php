<div class="form-group{{ $errors->has('user_id') ? ' has-error' : ''}}">
    {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $userid, isset($stream->user_id) ? $stream->user_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('content_id') ? ' has-error' : ''}}">
    {!! Form::label('content_id', 'Content Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('content_id', $contentid, isset($stream->content_id) ? $stream->content_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('stream_date') ? ' has-error' : ''}}">
    {!! Form::label('stream_date', 'Stream Date: ', ['class' => 'control-label']) !!}
    {!! Form::date('stream_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('stream_date', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('stream_time') ? ' has-error' : ''}}">
    {!! Form::label('stream_time', 'Stream Time: ', ['class' => 'control-label']) !!}
    {!! Form::time('stream_time', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('stream_time', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('stream_length') ? ' has-error' : ''}}">
    {!! Form::label('stream_length', 'Stream Length: ', ['class' => 'control-label']) !!}
    {!! Form::text('stream_length', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('stream_length', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('stream_rate') ? ' has-error' : ''}}">
    {!! Form::label('stream_rate', 'Stream Rate: ', ['class' => 'control-label']) !!}
    {!! Form::text('stream_rate', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('stream_rate', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
