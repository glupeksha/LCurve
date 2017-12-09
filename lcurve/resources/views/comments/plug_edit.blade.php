@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Comment</h3>
        <hr class="hr_style">
            {{ Form::model($comment, array('route' => array('comments.update', $comment->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
