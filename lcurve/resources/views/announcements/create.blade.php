@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Announcement</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'announcements.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('content', 'Announcement content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('subscribe', 'Subscribe content') }}
            {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Create Announcement', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection