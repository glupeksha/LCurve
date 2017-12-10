@extends('layouts.app')
@section('dash-left')

  <h2>
    <i class='fa fa-user-plus'></i>
       Edit {{$download->title}}
  </h2>
  <hr>
  {{ Form::model($download, array('route' => array('downloads.update', $download->id), 'method' => 'put', 'files' => true)) }}

  <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null, array('class' => 'form-control')) }}
  </div><br>

  <div class="form-group">
      {{ Form::label('file', 'File') }}
      {{ Form::file('file') }}
  </div><br>

  <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::text('description', null, array('class' => 'form-control')) }}
  </div><br>
  {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

@endsection
