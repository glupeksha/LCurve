@extends('layouts.app')
@section('dash-left')

{{-- About Us--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px;">
    <div class="col-lg-12 notify_head notify_head_cr">
        <div class="col-lg-3 notify_indi notify_indi_cr">
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


{{--Who can Subcribe--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px;">
    <div class="col-lg-12 notify_head notify_head_cr">
        <div class="col-lg-3 notify_indi notify_indi_cr">
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
</div>

<hr>

{{--Announcement--}}
<div class="col-lg-12 notify notify_cr">
  <div class="col-lg-12 notify_head notify_head_cr">
    <div class="col-lg-3 notify_indi notify_indi_cr">
        Announcements
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

      @foreach ($society->announcements as $announcement)
        <h6>{{$announcement->title}}</h6>
        <p>{{$announcement->content}}</p>
      @endforeach
    </div>
  </div>
</div>

<hr>




@endsection
