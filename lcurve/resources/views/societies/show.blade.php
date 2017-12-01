@extends('layouts.app')
@section('dash-left')

    <h1>About Us</h1>
    <hr>
    <p class="lead">{{ $society->content }} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['societies.destroy', $society->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Society')
    <a href="{{ route('societies.edit', $societies->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Society')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}



@endsection