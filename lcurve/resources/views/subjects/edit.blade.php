@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Subject</h3>
        <hr style="border-color: {{ $subject->color }};">
            {{ Form::model($subject, array('route' => array('subjects.update', $subject->id), 'method' => 'PUT', 'files'=>'true')) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('color', 'Color') }}
            {{ Form::text('color', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('image', 'Subject image') }}
            {{ Form::file('image', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
