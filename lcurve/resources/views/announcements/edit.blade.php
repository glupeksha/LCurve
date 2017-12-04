@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Announcement</h3>
          <hr style="border-color:#848991">
            {{ Form::model($announcement, array('route' => array('announcements.update', $announcement->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
