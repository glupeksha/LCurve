@extends('layouts.admin.app')

@section('dash-left')
    <br><br>
    <div class="panel panel-default">
        <div class="panel-body panel-heading">
            <br>
            <lable><b>Grade :</b></lable>
            {{ $classRoom->grade->name }}
           <hr style="border-color:#848991">

           <lable><b>Name Of The class :</b></lable>
            {{$classRoom->name}}
            <br>

            <div class="row">
                <div class="col-lg-8"></div>
               {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['classRooms.destroy', $classRoom->id] ]) !!}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                @can('Edit ClassRoom')
                <a href="{{ route('classRooms.edit', $classRoom->id) }}" class="btn btn-info" role="button">Edit</a>
                @endcan

                @can('Delete ClassRoom')
                  {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                @endcan
                {!! Form::close() !!}
            </div>
            <br>
        </div>


    </div>


@endsection
