@extends('layouts.app')
@section('content')

  <div class="panel panel-default">

    <div class="panel-heading">
      <h3 class="text-uppercase">Downloads
        @can('Upload File')
          <small class="pull-right text-capitalize">
            <a href="{{route('downloads.create')}}">Upload</a>
          </small>
        @endcan
      </h3>
    </div>

    <div class="panel-body">
      {{-- Display downloads - Start --}}
      @foreach($downloads as $download)
        <div class="thumbnail">
          <span class="glyphicon glyphicon-download"></span>
          <a href="{{route('downloads.show', $download->filename)}}">{{$download->title}}</a>
          <p>{{$download->description}}</p>

          @can('Edit File')
            <a href="{{ URL::to('downloads/'.$download->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
          @endcan
          @can('Delete File')
            {!! Form::open(['method' => 'DELETE', 'route' => ['downloads.destroy', $download->id] ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          @endcan
        </div>

      @endforeach
      {{-- Display downloads - End --}}
    </div>
  </div>

@endsection
