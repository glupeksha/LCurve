@extends('layouts.admin.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Class Room</h3>
         <hr style="border-color:#848991">
            {{ Form::model($classRoom, array('route' => array('classRooms.update', $classRoom->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('grade_id', 'Grade') }}
            {{ Form::text('grade_id', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('name', 'Name Of The Class') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

        <div class="col-lg-10"></div>
            {{ Form::submit('Save', array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
