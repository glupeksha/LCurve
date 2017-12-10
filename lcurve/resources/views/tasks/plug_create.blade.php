<div class="form-group">
    {{ Form::label('essay', 'Essay') }}
    {!! Form::textarea('essay', null, array('class' => 'form-control','id'=>'myTextarea')) !!}
    <br>

    {{ Form::submit('Create Essay', array('class' => 'btn btn-success btn-lg btn-block')) }}
</div>
