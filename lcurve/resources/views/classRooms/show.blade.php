@extends('layouts.app')

@section('dash-left')
    <br><br>
    <div class="container" style="border:solid; width: 300px;">
        <br>
        <li style="list-style-type:disc"><lable><b>Grade :</b></lable>
        {{ $classRoom->grade }}
        </li>
        <hr>
        <li style="list-style-type:disc"><lable><b>Name Of The class :</b></lable>
        {{ $classRoom->name }} 
        </li>
        <hr>

        {!! Form::open(['method' => 'DELETE', 'route' => ['classRooms.destroy', $classRoom->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        @can('Edit ClassRoom')
        <a href="{{ route('classRooms.edit', $classRoom->id) }}" class="btn btn-info" role="button">Edit</a>
        @endcan
        @can('Delete ClassRoom')
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        @endcan
        {!! Form::close() !!}
        <br>
    </div>


@endsection