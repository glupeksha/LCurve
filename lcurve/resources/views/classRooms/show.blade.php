@extends('layouts.app')

@section('dash-left')
    <br><br>
    <div class="panel panel-default">
        <div class="panel-body panel-heading"> 
            <br>
            <lable><b>Grade :</b></lable>
            {{ $classRoom->grade->name }}
           <hr style="border-color:#848991">
           
           <lable><b>Name Of The class :</b></lable>
            {{ $classRoom->name }} 
            <br>
            
            <div class="row">
                <div class="col-lg-8"></div>  
                {!! Form::open(['method' => 'DELETE', 'route' => ['classRooms.destroy', $classRoom->id] ]) !!}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                @can('Edit ClassRoom')
                <a href="{{ route('classRooms.edit', $classRoom->id) }}" class="btn btn-info" role="button">Edit</a>
                @endcan
               
                @can('Delete ClassRoom')
                <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                @endcan
                {!! Form::close() !!}
            </div>
            <br>
        </div>

        <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['classRooms.destroy', $classRoom->id] ]) !!}
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


@endsection