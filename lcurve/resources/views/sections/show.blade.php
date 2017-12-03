@extends('layouts.app')

@section('dash-left')


    <h1>{{ $section->grade }}</h1>
    <hr style="border-color:#848991">
    
    <hr style="border-color:#848991">
    {!! Form::open(['method' => 'DELETE', 'route' => ['sections.destroy', $section->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Section')
    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Section')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}


@endsection