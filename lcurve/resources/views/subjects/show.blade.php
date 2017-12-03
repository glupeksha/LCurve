@extends('layouts.app')
@section('dash-left')

<h3><img src="{{$subject->image}}"/> {{ $subject->name }}</h3>
<br>
<div class="col-lg-11">
    <div class="container" style="border-width: 10px;background-color:{{ $subject->color }};max-height:3px;max-width: 690px;">
    <br><br>
    </div>
</div>
<br>

    {!! Form::open(['method' => 'DELETE', 'route' => ['subjects.destroy', $subject->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Subject')
    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Subject')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

@endsection

