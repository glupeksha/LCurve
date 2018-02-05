@extends('layouts.app')
@section('dash-left')

<div class="panel panel-default">
  <div class="panel-body panel-heading">
    <h3>{{ $grade->name }}</h3>

    <hr class="hr_style">    
    <hr class="hr_style"> 
          
     <div class="col-lg-9">
     {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['grades.destroy', $grade->id] ]) !!} 

     <!-- edit delete buttons -->

      <a href="{{ url()->previous() }}" class="btn btn-success">@lang('applang.back')</a>
        
      @if(Auth::User()->can('Edit Grade') || Auth::User()->can('Edit Grade'.$grade->id)) 
          <a href="{{ route('grades.edit', $grade) }}" class="btn btn-success" role="button">@lang('applang.edit')</a>
      @endif
      @if(Auth::User()->can('Delete Grade') || Auth::User()->can('Delete Grade '.$grade->id)) 
          {!! Form::submit(Lang::get('applang.delete'),['class'=>'btn btn-success']) !!}
      @endif
      {!! Form::close() !!}
    </div>


  </div>  
</div>

@endsection
