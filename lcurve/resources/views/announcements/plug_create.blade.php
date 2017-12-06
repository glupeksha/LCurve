<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
    <br>

    {{ Form::label('content', 'Announcement content') }}
    {{ Form::textarea('content', null, array('class' => 'form-control')) }}

    <br>

    {{ Form::submit('Create Announcement', array('class' => 'btn btn-success btn-lg btn-block')) }}
</div>
