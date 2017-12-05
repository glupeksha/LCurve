@extends('layouts.app')

@section('dash-left')


    <h1>{{ $grade->name }}</h1>
    <hr>

    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['grades.destroy', $grade] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Grade')
    <a href="{{ route('grades.edit', $grade) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Grade')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}


@endsection
