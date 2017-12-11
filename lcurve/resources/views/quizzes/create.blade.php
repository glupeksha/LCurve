@extends('layouts.app')
@section('dash-left')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create a Quiz</h3>
         <hr style="border-color:#848991">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'quizzes.store')) }}

        <div class="form-group">
        	{{ Form::hidden('invisible',$quiz_id, array('id' => 'invisible_id')) }}
            {!! Form::label('question_id', 'Title Of Question*', ['class' => 'control-label']) !!}
            {!! Form::select('question_id', $questions, old('question_id'), ['class' => 'form-control']) !!}

            <br>
            {{ Form::label('ammount', 'Enter Number Of questions') }}
            {{ Form::text('ammount', null, array('class' => 'form-control')) }}
            <br>          

            {{ Form::submit('Create Quiz', array('class' => 'btn btn-success btn-lg btn-success')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection