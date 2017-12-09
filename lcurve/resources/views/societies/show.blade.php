@extends('layouts.app')
@section('dash-left')


<!--about us pane start-->
{{-- About Us--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:#abad85; ">
    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:#abad85; background-color:#d9dbaa;color: #606060; ">
            About Us
        </div>
        <div class="col-lg-7"></div>
    </div>

    <hr>

    <div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
        <p >{{ $society->content }} </p>
      </div>
    </div>
</div>
<!--about us pane end-->

<!--subscribe pane start-->
{{--Who can Subcribe--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:#abad85; color: #606060; ">
     <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:#abad85; background-color:#d9dbaa; color: #606060;">
            Who Can Subscribe
        </div>
        <div class="col-lg-7"></div>
    </div>

    <hr>

    <div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
        <p >{{ $society->subscribe }} </p>
      </div>
  </div>
  <!--subscribe button-->
  <div class="row">
      <div class="col-lg-8"></div>
      <button class="button" style="vertical-align:middle; background-color:#d9dbaa; color: #606060; "><span>Subscribe</span></button>
  </div>


</div>
<!--subscribe pane end-->


<hr>
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:#abad85;  color: #606060; ">
<div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; color: #606060; border-color:#abad85; background-color:#d9dbaa;">
           Announcements
        </div>
        <div class="col-lg-7"></div>
    </div>
<div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
         @foreach ($society->announcements as $announcement)
          <div class= "panel panel-info" style="border-width: 2px; border-color:#abad85; ">
            <div class="panel-heading" style="background-color:#d9dbaa; color: #606060; ">

              <div class="row">
                <div class="col-lg-11">
                  <a href="{{ route('announcements.show', $announcement->id ) }}" style="color: #606060;"> 
                  <h6><b>{{$announcement->title}}</b></h6></a>
                </div>
                <div class="col-lg-1">

                  <svg height="20" width="20">
                    <circle cx="10" cy="10" r="8" stroke-width="1" fill="{{$society->color}}" ></circle>
                    Sorry, your browser does not support inline SVG.  
                  </svg>

                 
                </div>
              </div>

            </div>
             <div class="panel-body" >
             <p class="teaser"> 
                <p>{{  str_limit($announcement->content, 100) }} {{-- Limit teaser to 100 characters --}}</p>
             </p>
            </div>
          </div>
        @endforeach
      </div>
</div>
</div>
<!--announcement pane start-->
{{--Announcement--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:#abad85;color: #606060; ">

    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:#abad85; background-color:#d9dbaa; color: #606060; ">
           Add Announcement
        </div>
        <div class="col-lg-7"></div>
    </div>

<hr>


  <div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">

        @can('Create Announcement')
          {{ Form::open(array('action' => array('AnnouncementController@storeUnderSociety', $society))) }}
          @include('announcements.plug_create')
        @endcan

       
      </div>
  </div>
</div>
<!--announcement pane end-->
<hr>


@endsection


