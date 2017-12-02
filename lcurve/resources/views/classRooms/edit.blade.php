@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Class Room</h1>
        <hr>
            {{ Form::model($classRoom, array('route' => array('classRooms.update', $classRoom->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('grade', 'Grade') }}
            {{ Form::text('grade', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('name', 'Name Of The Class') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
