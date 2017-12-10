
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
          @endcan
        </div>



