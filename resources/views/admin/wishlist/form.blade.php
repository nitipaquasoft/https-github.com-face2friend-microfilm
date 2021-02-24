<div class="form-group{{ $errors->has('user_id') ? ' has-error' : ''}}">
    {!! Form::label('user_id', 'User Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('user_id', $userid, isset($wishlist->user_id) ? $wishlist->user_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('content_id') ? ' has-error' : ''}}">
    {!! Form::label('content_id', 'Content Id: ', ['class' => 'control-label']) !!}
    {!! Form::select('content_id', $contentid, isset($wishlist->content_id) ? $wishlist->content_id : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>




<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
