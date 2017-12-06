@extends('layouts.app')
@section('dash-left')

<div class="panel panel-default">
  <div class="panel-body panel-heading"> 
    <h3>{{ $grade->name }}</h3>
    <hr class="hr_style">    
    <hr class="hr_style">  
    
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    <!-- edit delete buttons -->
    @can('Edit Grade')
      <a href="{{ route('grades.edit', $grade) }}" class="btn btn-info" role="button">Edit</a>
    @endcan

    @can('Delete Grade')
      <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
    @endcan

    <!-- Modal - start -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        {!! Form::open(['method' => 'DELETE', 'route' => ['grades.destroy', $grade->id] ]) !!}
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

</div>
 
    

</div>

@endsection
