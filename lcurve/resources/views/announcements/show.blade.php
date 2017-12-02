@extends('layouts.app')

@section('dash-left')


    <h1>{{ $announcement->title }}</h1>
    <hr>
    <p>{{ $announcement->content }} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['announcements.destroy', $announcement->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Announcement')
    <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Announcement')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}


@endsection
