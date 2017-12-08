@extends('layouts.app')

@section('dash-left')
    <div class="panel panel-primary">
      <div class="panel panel-heading">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b>{{ $forum->title }}</b>
            </div>
            <div class="panel-body" >
              {{ $forum->content }}
            </div>
        </div>

        {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        @can('Edit Forum')
        <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-info" role="button">Edit</a>
        @endcan
        @can('Delete Forum')
          <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#delModal">Delete</button>
        @endcan
        {!! Form::close() !!}
        <!-- Modal - start -->
        {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
          @include('layouts.deleteconfirm')
        {!! Form::close() !!}
        <!-- Modal - end -->
      </div>

      <div class="panel-body">
        <div class="">
          <h6>comments</h6>
          @include('comments.plug_index',$forum)
        </div>

        @include('comments.plug_create',$forum)
      </div>



  </div>


@endsection
