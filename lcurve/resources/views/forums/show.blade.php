@extends('layouts.app')

@section('dash-left')

  <div class="panel-group">
    
    <div class="panel panel-primary">
        
      <div class="panel-heading"> <h3>{{ $forum->title }}</h3></div>
      <div class="panel-body"><p >{{ $forum->content }} </p></div>
      {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        @can('Edit Forum')
        <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-info" role="button">Edit</a>
        @endcan
        @can('Delete Forum')
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        @endcan
        {!! Form::close() !!}
    </div>
</div>

@endsection