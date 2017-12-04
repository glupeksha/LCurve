@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Subject For a Class</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'classSubjects.store')) }}

        <div class="form-group">
            {{ Form::label('classRoom_id', 'Class Room') }}
            {{ Form::text('classRoom_id', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('subject_id', 'Subject Name') }}
            {{ Form::text('subject_id', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('teacher_id', 'Teacher In Charge') }}
            {{ Form::text('teacher_id', null, array('class' => 'form-control')) }}
            <br>

            

            {{ Form::submit('Create ClassSubject', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }} 
        </div>
        </div>
    </div>

@endsection