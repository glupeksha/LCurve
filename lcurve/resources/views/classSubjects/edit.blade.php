@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Subject for a Class</h1>
        <hr>
            {{ Form::model($classSubject, array('route' => array('classSubjects.update', $classSubject->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('classRoom_id', 'Class Room') }}
            {{ Form::text('classRoom_id', null, array('class' => 'form-control')) }}
           
            {{ Form::label('subject_id', 'Subject Name') }}
            {{ Form::text('subject_id', null, array('class' => 'form-control')) }}

            {{ Form::label('teacher_id', 'Teacher In Charge') }}
            {{ Form::text('teacher_id', null, array('class' => 'form-control')) }}

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
