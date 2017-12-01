@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Section</h1>
        <hr>
            {{ Form::model($section, array('route' => array('sections.update', $section->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('grade', 'Grade') }}
            {{ Form::text('grade', null, array('class' => 'form-control')) }}<br>

            
            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection