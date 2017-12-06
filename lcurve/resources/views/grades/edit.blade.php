@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Grade</h3>
       <hr style="border-color:#848991">
            {{ Form::model($grade, array('route' => array('grades.update', $grade->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Grade') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

         <div class="col-lg-10"></div>     
            {{ Form::submit('Save', array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection