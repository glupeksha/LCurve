@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Forum</h3>
        <hr style="border-color:#848991">
        
            {{ Form::model($forum, array('route' => array('forums.update', $forum->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection+
