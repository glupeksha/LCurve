@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>Edit Sport</h3>

        <hr class="hr_style">
        {{ Form::model($sport, array('route' => array('sports.update', $sport->id), 'method' => 'PUT', 'files'=>'true')) }}
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

                {{ Form::label('content', 'About Us') }}
                {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>


                {{ Form::label('subscribe', 'Who can subscribe') }}
                {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}<br>


                {{ Form::label('color', 'Color') }}
                {{ Form::text('color', null, array('class' => 'form-control')) }}<br>

                <div class="col-lg-10"></div>

                {{ Form::submit('Save', array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}
            </div>
        {{ Form::close() }}        
    </div>
</div>

@endsection
