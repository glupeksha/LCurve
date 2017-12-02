@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New ClassRoom</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'classRooms.store')) }}

        <div class="form-group">

            {{ Form::label('grade', 'Grade') }}
            {{ Form::text('grade', null, array('class' => 'form-control')) }}

            <br>
            {{ Form::label('name', 'Class Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            <br>

           

            {{ Form::submit('Create ClassRoom', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection