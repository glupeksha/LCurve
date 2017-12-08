@extends('layouts.app')

@section('dash-left')

<div class="panel-group">
    
    <div class="panel-primary">
     <div class="panel-body">
                    <div class= "panel panel-info" style="border-color:#bbbe64 ;border-width: 2px; ">                    
                        <div class="panel-heading" style="background-color: #d9dbaa !important; ">
                            <a href="{{ route('tasks.show', $task->id ) }}"><b>{{ $task->title }}</b></a>
                        <br>
                        </div>
                        <div class="panel-body" >
                          <div class="container col-lg-11">
                            <div class="list-group">
                              <li class="list-group-item"><p><b>Event Start Date:</b> {{$task->title}}</p></li>
                              <li class="list-group-item"><p><b>Event End Date:</b> {{$task->due_date}}</p></li>
                              <li class="list-group-item"><p><b>All Day Event:</b> {{$task->content}}</p></li>
                              <li class="list-group-item"><p><b>Event Colour:</b> {{$task->isAssignment}}</p></li>
                      
                            </div>
                          </div>
                           
                        </div>                 
                    </div>
                </div>
<div class="row">
    <div class="col-lg-8" ></div>
    {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['tasks.destroy', $task->id] ]) !!} 
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Task')
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Task')                       
      {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}
     
</div>
</div>
</div>
@endsection
