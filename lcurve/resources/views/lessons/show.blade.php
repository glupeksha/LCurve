@extends('layouts.app')

@section('dash-left')


    <h1>{{$lesson->title}}</h1>
    <hr>
    <div>
        {!! $lesson->content !!}
    </div>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['lessons.destroy', $lesson->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Lesson')
    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Lesson')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}


@endsection