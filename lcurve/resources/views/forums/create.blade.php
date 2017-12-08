@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Forum</h3>
         <hr style="border-color:#848991">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'forums.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('content', 'Forum content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Create Forum', array('class' => 'btn btn-success btn-lg btn-block')) }}

        </div>
        {{ Form::close() }}
        </div>
    </div>

@endsection
