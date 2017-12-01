@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Societies About Us</h1>
        <hr>
            {{ Form::model($society, array('route' => array('societies.update', $society->id), 'method' => 'PUT')) }}
        <div class="form-group">

            {{ Form::label('body', 'society Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection