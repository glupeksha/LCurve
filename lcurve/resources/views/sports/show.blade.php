@extends('layouts.app')
@section('dash-left')


<!--about us pane start-->
{{-- About Us--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; ">
    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; background-color:{{ $sport->color }}; ">
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
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; ">
     <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; background-color:{{ $sport->color }}; ">
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
  <!--subscribe button-->
  <div class="row">
      <div class="col-lg-8"></div>
      <button class="button" style="vertical-align:middle; background-color: {{ $sport->color }}; border-color: {{ $sport->color }}; "><span>Subscribe</span></button>
  </div>


</div>
<!--subscribe pane end-->

<hr>
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; ">
<div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; background-color:{{ $sport->color }}; ">
           Announcements
        </div>
        <div class="col-lg-7"></div>
    </div>
<div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
         @foreach ($sport->announcements as $announcement)
          <div class= "panel panel-info" style="border-color:{{ $sport->color }};border-width: 2px; ">
            <div class="panel-heading" style="background-color:{{ $sport->color }}; !important; ">
            <a href="{{ route('announcements.show', $announcement->id ) }}" style="color: white"> 
                <h6>{{$announcement->title}}</h6>
            </a>
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


{{--Announcement--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; ">

    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $sport->color }}; background-color:{{ $sport->color }}; ">
           Add Announcement
        </div>
        <div class="col-lg-7"></div>
    </div>

<hr>
  <hr>

  <div class="raw">
    <div class="col-lg-12 notify_body notify_body_cr">

      @can('Create Announcement')
        {{ Form::open(array('action' => array('AnnouncementController@storeUnderSport', $sport))) }}
        @include('announcements.plug_create')
        {{ Form::close() }}
      @endcan
 
    </div>
  </div>
</div>

<hr>




@endsection
