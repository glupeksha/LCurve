@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Society</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'societies.store')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('content', 'Society About Us') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}
            <br>


            {{ Form::label('subscribe', 'Subscribe content') }}
            {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}
            <br>

             {{ Form::label('color', 'Color') }}
            {{ Form::color('color', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Create Society', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection
