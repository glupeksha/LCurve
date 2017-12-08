{{ Form::open(array('action'=>array('CommentController@store',$forum))) }}
<div class="form-group">
    {{ Form::textarea('content', null, array('class' => 'form-control', 'placeholder'=>'Your comment here..')) }}
    <br>
    {{ Form::submit('Add Comment', array('class' => 'btn btn-success btn-lg btn-block')) }}
</div>
{{ Form::close() }}
