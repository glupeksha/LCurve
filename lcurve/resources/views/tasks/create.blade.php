@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Task</h3>
        <hr style="border-color:#848991">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'tasks.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>
            
            {{ Form::label('due_date', 'Due Date') }}
            {{ Form::date('due_date', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Content') }}
            {{ Form::text('content', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('isAssignment', 'Is it an assignment?') }} <br>
            {{ Form::checkbox('isAssignment', '1', null, array('class' => 'form-control,checkbox-inline') ) }} Yes


            {{ Form::submit('Create Task', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection
