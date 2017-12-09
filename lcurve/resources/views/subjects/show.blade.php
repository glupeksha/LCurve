@extends('layouts.app')
@section('dash-left')

<h3><img src="{{$subject->image}}"/> {{ $subject->name }}</h3>
<br>
<hr class="line-style" style="border-color:{{ $subject->color }};">
<hr class="line-style" style="border-color:{{ $subject->color }};">
   
<div class="col-lg-9"></div>
<!-- edit and delete button start -->
{!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['subjects.destroy', $subject->id] ]) !!} 
    @can('Edit Subject')
      <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan    

    @can('Delete Subject')                       
      {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
    @endcan
  <!-- edit and delete button end-->
{!! Form::close() !!}
                   

@endsection

