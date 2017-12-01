@extends('layouts.app')
@section('dash-left')

    <h1>{{$subjects->title}}</h1>
    <hr>
    
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['subjects.destroy', $subject->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Subject')
    <a href="{{ route('subjects.edit', $subjects->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Subject')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}



@endsection