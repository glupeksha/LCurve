@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Subject</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'subjects.store', 'files'=>'true')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
            <br>


            {{ Form::label('image', 'Subject Image') }}
            {{ Form::file('image', null, array('class' => 'form-control')) }}
            <br>

             {{ Form::label('color', 'Color') }}
            {{ Form::color('color', null, array('class' => 'form-control')) }}
            <br>



            {{ Form::submit('Create Subject', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection
