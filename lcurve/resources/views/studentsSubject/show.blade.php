@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Society</h3>
        

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('action' => 'StudentSubjectsController@view', 'method' => 'get')) }}

        <div class="form-group">
            {{ Form::label('user_id', 'Enter Student Id') }}
            {{ Form::text('user_id', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Looks For Subjects', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection
