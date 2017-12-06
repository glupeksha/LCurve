
@extends('layouts.app')

@section('dash-left')
<div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Attach Subjects</h3>
        <hr>
;
    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{Form::open(array('action' => 'UserController@selectSubject', 'method' => 'get'))}}
        {{ Form::hidden('invisible1', $user_id, array('id' => 'invisible_id1')) }}
        <div class="form-group">
            {{ Form::label('id', 'Enter classroom Id') }}
            {{ Form::text('id', null, array('class' => 'form-control')) }}
            <br>


            {{ Form::submit('Search Subjects', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>


@endsection