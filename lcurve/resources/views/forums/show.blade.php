@extends('layouts.app')

@section('dash-left')


    <h1>{{ $forum->title }}</h1>
    <hr>
    <p >{{ $forum->content }} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Forum')
    <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Forum')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}


@endsection