@extends('layouts.app')

@section('dash-left')


    <label>Grade : </label>{{  $classSubject->classRoom->grade->name }}<br>
    <label>Class : </label>{{  $classSubject->classRoom->name }}<br>
    <label>Subject name : </label>{{  $classSubject->subject->name }}<br>
    <label>Teacher name : </label>{{  $classSubject->teacher->name }}<br>

    
    {!! Form::open(['method' => 'DELETE', 'route' => ['classSubjects.destroy', $classSubject->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit ClassSubject')
    <a href="{{ route('classSubjects.edit', $classSubject->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete ClassSubject')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}


@endsection