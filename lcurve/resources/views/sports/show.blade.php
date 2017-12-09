@extends('layouts.app')
@section('dash-left')

<!--about us pane start-->
{{-- About Us--}}
<div class="col-lg-12 notify_cr outter-styles" style=" border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif  ">
    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ;background-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; color: #ffffff ">
            About Us
        </div>
        <div class="col-lg-7"></div>
    </div>
    <hr>

    <div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
        <p >{{ $sport->content }} </p>
      </div>
    </div>
</div>
<!--about us pane end-->


<!--subscribe pane start-->
{{--Who can Subcribe--}}
<div class="col-lg-12 notify_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif  ">
     <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; background-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif; color: #ffffff">
            Who Can Subscribe
        </div>
        <div class="col-lg-7"></div>
    </div>
    <hr>
    <div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
        <p >{{ $sport->subscribe }} </p>
      </div>
    </div>
  <!--subscribe button start-->
    <div class="row">
        <div class="col-lg-8"></div>
        <button class="button" style="background-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ;border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; color: #ffffff ">
            <span>Subscribe</span>
        </button>
    </div>
    <!--subscribe button end-->
</div>
<!--subscribe pane end-->

<!--Announcements pane start-->
{{--Announcement--}}
<div class="col-lg-12 notify_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; ">
  <div class="col-lg-12 notify_head" >
    <div class="col-lg-3 notify_indi notify_indi_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; background-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; color: #ffffff">
      Announcements
    </div>
    <div class="col-lg-7"></div>
  </div>

  <div class="raw">
    <div class="col-lg-12 notify_body notify_body_cr">
      @foreach ($sport->announcements as $announcement)
        <div class= "panel panel-info outter-styles" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ;">
        <!--Announcements title start-->
          <div class="panel-heading" style="background-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ;  ">
          <div class="col-lg-11">
            <a href="{{ route('announcements.show', $announcement->id ) }}" class="header-color" style="color: #ffffff"> 
                <h6>{{$announcement->title}}</h6>
            </a>
          </div>
            <svg height="20" width="20">
                  <circle cx="10" cy="10" r="8" stroke-width="1" fill="@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif " ></circle>
                                Sorry, your browser does not support inline SVG.  
            </svg>
          </div>
        <!--Announcements title end-->
        <!--Announcements content start-->
          <div class="panel-body" >
            <p class="teaser"> 
              <p>{{  str_limit($announcement->content, 100) }} {{-- Limit teaser to 100 characters --}}
              </p>
            </p>
          </div>
        <!--Announcements content end-->
        </div>
      @endforeach
    </div>
  </div>

</div>
<!--Announcements pane end-->

<!--Add Announcements pane start-->
{{--Add Announcement--}}
<div class="col-lg-12 notify_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; ">
  <div class="col-lg-12 notify_head" >
    <div class="col-lg-3 notify_indi notify_indi_cr" style="border-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; background-color:@if(!empty( $sport->color )) {{ $sport->color}} @else #abad85 @endif ; color: #ffffff ">
       Add Announcement
    </div>
    <div class="col-lg-7"></div>
  </div>
  <!--Add Announcements titleand content pane start-->
  <div class="raw">
    <div class="col-lg-12 notify_body notify_body_cr">
      @can('Create Announcement')
        {{ Form::open(array('action' => array('AnnouncementController@storeUnderSport', $sport))) }}
        @include('announcements.plug_create')
        {{ Form::close() }}
      @endcan 
    </div>
  </div>
  <!--Add Announcements titleand content pane start-->
</div>
<!--Add Announcements pane start-->

<hr>

@endsection
