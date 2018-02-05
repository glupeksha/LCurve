@extends('layouts.app')
@section('dash-left')

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


            <!--starts Download edit permissions-->
            @if(Auth::User()->can('Edit File') || Auth::User()->can('Edit File '.$download->id))
            <a href="{{ URL::to('downloads/'.$download->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
            @endif

          <!--starts Download delete permissions-->
            @if(Auth::User()->can('Delete File') || Auth::User()->can('Delete File '.$download->id))
            {!! Form::open(['method' => 'DELETE', 'route' => ['downloads.destroy', $download->id] ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          @endif
        </div>

      @endforeach
      {{-- Display downloads - End --}}
    </div>
  </div>

            <!--starts Download create permissions-->
            @if(Auth::User()->can('View Download') || Auth::User()->can('View Download '.$download->id))
            <div class="col-lg-8">
                <a href="{{route('downloads.create')}}" class="btn btn-info" role="button" style="background-color: #0b9b7e;border-color: #0b9b7e;">Create New Download</a>
            </div>
            @endif

@endsection
