@extends('layouts.app')

@section('dash-left')

    <div class="panel-primary">
    <br><h3>Event Details</h3>
    <br>
     <div class="panel-body">
      
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
     {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['events.destroy', $event->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

    <!--starts event edit permissions-->    
    
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-info" role="button">Edit</a>
   
    
    <!--starts event delete permissions-->
              
      {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
 


    {!! Form::close() !!}
</div>
</div>

@endsection



