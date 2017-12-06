@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Task</h3>
          <hr style="border-color:#848991">
            {{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>
            
            {{ Form::label('due_date', 'Due Date') }}
            {{ Form::date('due_date', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Content') }}
            {{ Form::text('content', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('isAssignment', 'Is it an assignment?') }} <br>
            {{ Form::checkbox('isAssignment','true',1, array('class' => 'form-control,checkbox-inline') ) }} Yes <br>


            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
