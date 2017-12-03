@extends('layouts.app')
@section('dash-left')

<h3><img src="{{$subject->image}}"/> {{ $subject->name }}</h3>
<br>

<hr style="border-color:{{ $subject->color }}; border-width: 3px;">
<hr style="border-color:{{ $subject->color }}; border-width: 3px;">


    {!! Form::open(['method' => 'DELETE', 'route' => ['subjects.destroy', $subject->id] ]) !!}
    
    @can('Edit Subject')
    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Subject')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

@endsection

