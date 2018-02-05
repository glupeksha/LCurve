<div class="form-group">

    {{ Form::label('start', 'Start date') }}
    {{ Form::date('start', null, array('class' => 'form-control')) }}
    <br>

    {{ Form::label('end', 'End date') }}
    {{ Form::date('end', null, array('class' => 'form-control')) }}
    <br>

    {{ Form::label('isAllDay', 'Is it an all-day event?') }} <br>
    {{ Form::checkbox('isAllDay', null, array('class' => 'form-control,checkbox-inline') ) }} Yes <br>

    {{ Form::label('url', 'Give event url here') }}
    {{ Form::url('url', null, array('class' => 'form-control')) }}
    <br>

    {{ Form::submit('Create Event', array('class' => 'btn btn-success btn-lg btn-block')) }}
    {{ Form::close() }}
    
</div>
