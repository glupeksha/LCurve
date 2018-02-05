@extends('layouts.app')
@section('dash-left')

<h3><img src="{{$subject->image}}"/> {{ $subject->name }}</h3>
<br>
<hr class="line-style" style="border-color:{{ $subject->color }};">
<hr class="line-style" style="border-color:{{ $subject->color }};">

<div class="col-lg-9">
<!-- edit and delete button start -->
{!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['subjects.destroy', $subject->id] ]) !!}
    @can('Edit Subject')

      <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-success" role="button">@lang('applang.edit')</a>
    @endcan    

    @can('Delete Subject')                       
      {!! Form::submit(Lang::get('applang.delete'),['class'=>'btn btn-success']) !!}

    @endcan
  <!-- edit and delete button end-->
{!! Form::close() !!}

</div>
@endsection
