@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1"  >
        <div class="panel panel-default" > 
            <div class="panel-heading"  >        
                <b>{{ $forum->title }}</b>
            </div>

            <div class="col-md-offset-1" >
              <p class="test">{!! $forum->content !!}</p>
              <div class="col-md-offset-8"> 
                {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['forums.destroy', $forum->id] ]) !!} 

                  
                  @if(Auth::User()->can('Edit Forum') || Auth::User()->can('Edit Forum '.$forum->id))

                  <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-success" role="button" >Edit</a>
                  @endif
  
                  @if(Auth::User()->can('Delete Forum') || Auth::User()->can('Delete Forum '.$forum->id))                     
                    {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                  @endif
                {!! Form::close() !!}
                <br>
            </div>
          </div>  
        </div>       
        

        <div class="panel panel-default" > 
            <h5 ><b>&nbsp;  &nbsp; comments</b></h5>
             @include('comments.plug_index',$forum)          
        </div>

       @include('comments.plug_create',$forum)
      </div>


</div>
@endsection
