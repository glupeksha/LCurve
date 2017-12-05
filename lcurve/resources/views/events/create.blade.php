@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Event</h3>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'events.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('start', 'Start date') }}
            {{ Form::date('start', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('end', 'End date') }}
            {{ Form::date('end', null, array('class' => 'form-control')) }}
            <br>
          

            {{ Form::submit('Create Event', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection
