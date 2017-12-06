@extends('layouts.app')
@section('dash-left')


<!--about us pane start-->
{{-- About Us--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; ">
    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; background-color:{{ $society->color }}; ">
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
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; ">
     <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; background-color:{{ $society->color }}; ">
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
      <button class="button" style="vertical-align:middle; background-color: {{ $society->color }}; border-color: {{ $society->color }}; "><span>Subscribe</span></button>
  </div>


</div>
<!--subscribe pane end-->


<hr>
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; ">
<div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; background-color:{{ $society->color }}; ">
           Announcements
        </div>
        <div class="col-lg-7"></div>
    </div>
<div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
         @foreach ($society->announcements as $announcement)
          <div class= "panel panel-info" style="border-color:{{ $society->color }};border-width: 2px; ">
            <div class="panel-heading" style="background-color:{{ $society->color }}; !important; ">
            <a href="{{ route('announcements.show', $announcement->id ) }}" style="color: white"> 
                <h6><b>{{$announcement->title}}</b></h6></a>
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
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; ">

    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:{{ $society->color }}; background-color:{{ $society->color }}; ">
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


