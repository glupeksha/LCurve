@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit About Us</h3>


        <hr style="border-color: {{ $society->color }};">
            {{ Form::model($society, array('route' => array('societies.update', $society->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', 'Society') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'About Us') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>


            {{ Form::label('subscribe', 'Who can subscribe') }}
            {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}<br>

             {{ Form::label('color', 'Color') }}
            {{ Form::text('color', null, array('class' => 'form-control')) }}<br>


            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}


            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection