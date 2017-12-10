@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1"  >
        <div class="panel panel-default" > 
            <div class="panel-heading"  >        
                <b>{{ $essay->question }}</b>
            </div>

            <div class="col-md-offset-1" >
              <p class="test">{!! $essay->content !!}</p>
              <div class="col-md-offset-6"> 
                {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['essays.destroy', $essay->id] ]) !!} 

                  <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>
                
                  @can('Edit Essay')
                  <a href="{{ route('essays.edit', $essay->id) }}" class="btn btn-success" role="button" >Edit</a>
                  @endcan
                 
                  @can('Delete Essay')                       
                    {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                  @endcan
                {!! Form::close() !!}
                <br>
            </div>
          </div>  
        </div>       
        <div class="panel panel-default" > 
            <h5 ><b>&nbsp;  &nbsp; Essay Answers</b></h5>            
          @include('essayAnswers.plug_index',$essay)  
             
        </div>


       @include('essayAnswers.plug_create',$essay)
</div>
</div>
@endsection
 