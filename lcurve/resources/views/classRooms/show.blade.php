@extends('layouts.app')

@section('dash-left')
    <br><br>
    <div class="panel panel-default">
        <div class="panel-body panel-heading">
            <br>
            <lable><b>Grade :</b></lable>
            {{ $classRoom->grade->name }}
            <br>
           <lable><b>Name Of The class :</b></lable>
            {{$classRoom->name}}
            
             <hr style="border-color:#848991">
              <hr style="border-color:#848991">

            <div class="row">

                <div class="col-lg-8"></div>  
               {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['classRooms.destroy', $classRoom->id] ]) !!} 
                <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>

                <!--starts Add society permissions-->
                @if(Auth::User()->can('Edit ClassRoom') || Auth::User()->can('Edit ClassRoom '.$classRoom->id))
                <a href="{{ route('classRooms.edit', $classRoom->id) }}" class="btn btn-success" role="button">Edit</a>
                @endif
               
                @if(Auth::User()->can('Delete ClassRoom') || Auth::User()->can('Delete ClassRoom '.$classRoom->id))                      
                  {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}

                @endif
                {!! Form::close() !!}
            </div>
            <br>
        </div>


    </div>


@endsection
