@extends('layouts.app')

@section('dash-left')

<div class="panel-group">
    
    <div class="panel-primary">
     <div class="panel-body">
      <br><h2>Event Details</h2>
                    <div class= "panel panel-info" style="border-color:#bbbe64 ;border-width: 2px; ">                    
                        <div class="panel-heading" style="background-color: #d9dbaa !important; ">
                            <a href="{{ route('events.show', $event->id ) }}"><b>{{ $event->title }}</b></a>
                        <br>
                        </div>
                        <div class="panel-body" >

                          <div class="container col-lg-11">
                            <div class="list-group">
                              <li class="list-group-item"><p><b>Event Start Date:</b> {{$event->start}}</p></li>
                              <li class="list-group-item"><p><b>Event End Date:</b> {{$event->end}}</p></li>
                              <li class="list-group-item"><p><b>All Day Event:</b> {{$event->isAllDay}}</p></li>
                              <li class="list-group-item"><p><b>Event Colour:</b> {{$event->color}}</p></li>
                              <li class="list-group-item"><p><b>Event Url:</b> {{$event->url}}</p></li>
                            </div>
                          </div>

                        </div>                 
                    </div>
                </div>
<div class="row">
    <div class="col-lg-8" ></div>
    {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Event')
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Event')
        <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
    @endcan

     <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id] ]) !!}
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h5 class="modal-title">Are you sure you want to delete?</h5>
                        </div>

                        <div class="modal-footer">          
                            {!! Form::submit('OK',array('class' => 'okbtnstyle')) !!}
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
    <!-- Modal - end -->
    {!! Form::close() !!}
</div>
</div>
</div>
@endsection



