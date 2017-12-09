@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-default" > 
            <div class="panel-heading" " >
                <h3>Announcements</h3>
            </div>

            @foreach ($announcements as $announcement)        
                <div class="panel-body panel-heading">
                        <a href="{{ route('announcements.show', $announcement->id ) }}" >
                            <p class="teaser">                            
                              <div class="col-lg-1 " >  
                                <img src="{{asset('images\announcement.png')}}"  class="image-style">
                              </div> 
                              <div class="col-lg-9 col-lg-offset-1">
                                {{  str_limit($announcement->title, 50) }} 
                                <br>
                        </a>
                                <small>
                                {!!  str_limit($announcement->content,75) !!} 
                                </small>
                              </div>
                            <div class="col-lg-1">
                              <a href="{{ route('announcements.show', $announcement->id ) }}">
                                <svg height="20" width="20">
                                    <circle cx="10" cy="10" r="8" stroke-width="1" fill="@if(!empty($announcement->announceable->color )) {{$announcement->announceable->color}} @else #3097D1 @endif " >
                                    </circle>
                                    Sorry, your browser does not support inline SVG.  
                                </svg>
                                </a>
                             </div>                           

                              
                            </p>


                    </div>
            
            @endforeach            
        <div class="text-center" >
            {!! $announcements->links() !!}
        </div>

    </div>
 </div>
</div>



@endsection