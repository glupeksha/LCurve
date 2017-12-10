@extends('layouts.app')
@section('dash-left')

  {{ Form::open(array('url' => 'downloads', 'files' => true)) }}

  <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', '', array('class' => 'form-control')) }}
  </div><br>

  <div class="form-group">
      {{ Form::label('file', 'File') }}
      {{ Form::file('file') }}
  </div><br>

  <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::text('description', '', array('class' => 'form-control')) }}
  </div><br>
  {{ Form::submit('Upload', array('class' => 'btn btn-primary')) }}

  {{ Form::close() }}

@endsection
