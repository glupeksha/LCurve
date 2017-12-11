@extends('layouts.app')

@section('dash-left')
    <br><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <br>

            <div class="col-lg-11 " >
                  <a href="{{ route('announcements.show', $announcement->id ) }}" ><b>{{ $announcement->title }}</b></a>
            </div>

            <svg height="20" width="20">
                <circle cx="10" cy="10" r="8" stroke-width="1" fill="@if(!empty($announcement->announceable->color )) {{$announcement->announceable->color}} @else #3097D1 @endif " >                    
                </circle>
                     Sorry, your browser does not support inline SVG.  
            </svg>
            <hr>
                <br>
              {{$announcement->content}}

            <br><br>
            <div class="row">
               
                <div class="col-lg-8"></div>  
               {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['announcements.destroy', $announcement->id] ]) !!}
    
                <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>

                <!--starts Add society permissions-->
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
            <br>
        </div>


    </div>


@endsection
