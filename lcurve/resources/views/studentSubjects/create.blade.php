@extends('layouts.app')

@section('dash-left')

<div class='form-group'>
	<div class="row">
                <h3>Subject</h3>
    </div>
    {{Form::open(array('action' => array('UserController@storeUserClassSubjects',$user), 'method' => 'post'))}}
		
		  @foreach ($classSubjects as $classsubject)
	        {{ Form::checkbox('classsubjects[]',  $classsubject->id) }}
	        {{ Form::label($classsubject->subject->name, ucfirst($classsubject->subject->name)) }}<br>
	    @endforeach

	{{ Form::submit('Attach  Subjects to student', array('class' => 'btn btn-success btn-lg btn-block')) }}
    {{ Form::close() }}
</div>


@endsection
