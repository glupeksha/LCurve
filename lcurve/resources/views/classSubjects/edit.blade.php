@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Subject for a Class</h3>
        <hr style="border-color:#848991">
            {{ Form::model($classSubject, array('route' => array('classSubjects.update', $classSubject->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('class_room_id', 'Class Room') }}
            {{ Form::text('class_room_id', null, array('class' => 'form-control')) }}

            <br>
           
            {{ Form::label('subject_id', 'Subject Name') }}
            {{ Form::text('subject_id', null, array('class' => 'form-control')) }}

            <br>
            {{ Form::label('teacher_id', 'Teacher In Charge') }}
            {{ Form::text('teacher_id', null, array('class' => 'form-control')) }}

            <br>
            <div class="col-lg-10"></div>
            {{ Form::submit('Save', array('class' =>'btn btn-primary','style'=>'background-color: #0b9b7e')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
