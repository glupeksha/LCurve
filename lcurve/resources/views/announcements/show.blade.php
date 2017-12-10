@extends('layouts.app')

@section('dash-left')

<div class="panel-group">
    
    <div class="panel-primary">
     <div class="panel-body">
        <div class= "panel panel-info " >                    
          <div class="panel-heading panel-styles" >
                <div class="col-lg-11">
                  <a href="{{ route('announcements.show', $announcement->id ) }}" class="panel-styles"><b>{{ $announcement->title }}</b></a>
                </div>
                <svg height="20" width="20">
                    <circle cx="10" cy="10" r="8" stroke-width="1" fill="@if(!empty($announcement->announceable->color )) {{$announcement->announceable->color}} @else #3097D1 @endif " >                    
                    </circle>
                         Sorry, your browser does not support inline SVG.  
                </svg>
                <br>
          </div>
          <div class="panel-body" >
              {{$announcement->content}}

              <div class="row">
                {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['announcements.destroy', $announcement->id] ]) !!}
    
                <div class="col-lg-8" ></div>
                <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>

                <!-- only authorized users can edit-->
                @if(Auth::User()->can('Edit Announcement') || Auth::User()->can('Edit Announcement '.$announcement->id))
                <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-success" role="button">Edit</a>
                @endif
                <!-- only authorized users can edit-->

                <!-- only authorized users can edit-->
                @if(Auth::User()->can('Delete Announcement') || Auth::User()->can('Delete Announcement '.$announcement->id))
                {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                @endif
                <!-- only authorized users can edit-->


                {!! Form::close() !!}                
              </div>
                           
            </div>                 
          </div>
        </div>

      </div>
</div>
@endsection
