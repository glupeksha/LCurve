@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Grade</h1>
        <hr>
            {{ Form::model($grade, array('route' => array('grades.update', $grade->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Grade') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

            
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection