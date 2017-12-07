@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-default" > 
            <div class="panel-heading" style="border-color:#d9dbaa;" >
                <h3>Announcements</h3>
            </div>
            <div class="panel-heading panel-heading-style" style="background-color:#d9dbaa; border-color:#d9dbaa !important">Page {{ $announcements->currentPage() }} of {{ $announcements->lastPage() }}
            </div>

            @foreach ($announcements as $announcement)         
                <div class="panel-body" style="color: #606060">
                    
                    <div class="panel panel-info" style="border-color:#abad85;
                    border-width: 2px;  ">                    
                        <div class="panel-heading" style="background-color:#d9dbaa;border-color:#d9dbaa;">
                            <div class="col-lg-11">
                                <a href="{{ route('announcements.show', $announcement->id ) }}" style="color: #606060;"><b>{{ $announcement->title }}</b></a>
                             </div>
                             <svg height="20" width="20">
                                <circle cx="10" cy="10" r="8" stroke-width="1" fill="@if(!empty($announcement->announceable->color )) {{$announcement->announceable->color}} @else #abad85 @endif " ></circle>
                                Sorry, your browser does not support inline SVG.  
                            </svg>

                        <br>
                        </div>
                        <div class="panel-body">
                            <p class="teaser">
                               {{  str_limit($announcement->content, 100) }} {{-- Limit teaser to 100 characters --}}
                            </p>
                        </div>                 
                    </div>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $announcements->links() !!}
        </div>
    </div>
</div>


@endsection