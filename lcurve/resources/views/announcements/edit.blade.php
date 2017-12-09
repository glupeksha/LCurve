@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>Edit Announcement</h3>
          <hr class="hr_style">
            {{ Form::model($announcement, array('route' => array('announcements.update', $announcement->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>
        <div class="col-lg-offset-10">
            {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
        </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
