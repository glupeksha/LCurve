@extends('layouts.app')
@section('dash-left')

<div class="panel panel-default">
  <div class="panel-body panel-heading">
    <h3>{{ $grade->name }}</h3>

    <hr class="hr_style">    
    <hr class="hr_style"> 
          
     <div class="col-lg-offset-8">  
     {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['grades.destroy', $grade->id] ]) !!} 

     <!-- edit delete buttons -->

      <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
        
      @if(Auth::User()->can('Edit Grade') || Auth::User()->can('Edit Grade'.$grade->id)) 
          <a href="{{ route('grades.edit', $grade) }}" class="btn btn-success" role="button">Edit</a>
      @endif
      @if(Auth::User()->can('Delete Grade') || Auth::User()->can('Delete Grade'.$grade->id)) 
          {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
      @endif
      {!! Form::close() !!}
    </div>


  </div>  
</div>

@endsection
