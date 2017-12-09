@extends('layouts.app')
@section('dash-left')

<div class="panel panel-default">
  <div class="panel-body panel-heading"> 
    <h3>{{ $grade->name }}</h3>
    <hr class="hr_style">    
    <hr class="hr_style"> 
          
     <div class="col-lg-offset-8">  
     {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['grades.destroy', $grade->id] ]) !!}  
        <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
        <!-- edit delete buttons -->

      
        @can('Edit Grade')
          <a href="{{ route('grades.edit', $grade) }}" class="btn btn-success" role="button">Edit</a>
        @endcan

        @can('Delete Grade')                       
          {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
        @endcan
      {!! Form::close() !!}
    </div>

  </div>  
</div>

@endsection
