@extends('layouts.app')
@section('dash-left')

<h3><img src="{{$subject->image}}"/> {{ $subject->name }}</h3>
<br>
<hr class="line-style" style="border-color:{{ $subject->color }};">
<hr class="line-style" style="border-color:{{ $subject->color }};">
   
<div class="col-lg-9"></div>
<!-- edit and delete button start -->
  @can('Edit Subject')
    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info" role="button">Edit</a>
  @endcan    

  @can('Delete Subject')
    <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">
      Delete
    </button>
  @endcan

  <!-- edit and delete button end-->

  <!-- Modal - start -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      {!! Form::open(['method' => 'DELETE', 'route' => ['subjects.destroy', $subject->id] ]) !!}
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5 class="modal-title">Are you sure you want to delete?</h5>
          </div>
          <div class="modal-footer">          
            {!! Form::submit('OK') !!}
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
  <!-- Modal - end -->

@endsection

