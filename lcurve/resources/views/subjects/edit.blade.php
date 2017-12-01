@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Subject</h1>
        <hr>
            {{ Form::model($subjects, array('route' => array('subjects.update', $subject->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('color', 'Color') }}
            {{ Form::text('color', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('image', 'Subject image') }}
            {{ Form::file('image', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection