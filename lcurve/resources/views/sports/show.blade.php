@extends('layouts.app')
@section('dash-left')


<br>
<div class="col-lg-12">
    <div class="container" style="border-width: 30px;background-color:{{ $sport->color }};max-height:3px;max-width: 720px;">
    <br><br>
    </div>
</div>
<br>
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
        <p >{{ $sport->content }} </p>
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
        <p >{{ $sport->subscribe }} </p>
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
        {{ Form::open(array('action' => array('AnnouncementController@storeUnderSport', $sport))) }}
        @include('announcements.plug_create')
        {{ Form::close() }}
      @endcan

      @foreach ($sport->announcements as $announcement)
        <h6>{{$announcement->title}}</h6>
        <p>{{$announcement->content}}</p>
      @endforeach
    </div>
  </div>
</div>

<hr>




@endsection
