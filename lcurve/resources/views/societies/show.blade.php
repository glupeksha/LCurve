@extends('layouts.app')
@section('dash-left')


<!--about us pane start-->
{{-- About Us--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif  ; ">
    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; background-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ;color: #ffffff; ">
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

    
    <div class="col-lg-8"></div>
        <a href="{{ route('societies.create') }}" class="btn btn-success panel-styles" role="button" >Add a new society</a>

</div>
<!--about us pane end-->

<!--subscribe pane start-->
{{--Who can Subcribe--}}
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; ">
     <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; background-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; color: #ffffff;">
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
  <!--Only users other than admin and subscribed users can subscribe-->
  @if(Auth::User()->can('Subscribe Society'.$society->id))
  <div class="row">
      <div class="col-lg-8"></div>
      <button class="button" style="vertical-align:middle; background-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; color: #ffffff; "><span>Subscribe</span></button>
  </div>
  @endif

</div>
<!--subscribe pane end-->


<hr>
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ;  ">
<div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; color: #ffffff; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; background-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif;">
           Announcements
        </div>
        <div class="col-lg-7"></div>
    </div>
<div class="raw">
      <div class="col-lg-12 notify_body notify_body_cr">
         @foreach ($society->announcements as $announcement)
          <div class= "panel panel-info " style="border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ;" >
            <div class="panel-heading" style="background-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; color: 000000; ">

              <div class="row">
                <div class="col-lg-11">
                  <a href="{{ route('announcements.show', $announcement->id ) }}" style="color: #ffffff;"> 
                  <h6>{{$announcement->title}}</h6></a>
                </div>
                
              </div>

            </div>
             <div class="panel-body" >
             <p class="teaser"> 
                <p>{{  str_limit($announcement->content, 100) }} {{-- Limit teaser to 100 characters --}}</p>
             </p>
            </div>
          </div>
          <script type="text/javascript">
             $(".panel-h").css("border-width": '2px', 
              "border-color":"@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ");
          </script>

        @endforeach
      </div>
</div>
</div>
<!--announcement pane start-->

{{--Announcement--}}
<!--Only authorized users can add announcements-->
@if(Auth::User()->can('Create '.$society->id.' Announcement'))
<div class="col-lg-12 notify_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; ">

    <div class="col-lg-12 notify_head" >
        <div class="col-lg-3 notify_indi notify_indi_cr" style="margin-bottom: 20px; border-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; background-color:@if(!empty( $society->color )) {{ $society->color}} @else #abad85 @endif ; color: #ffffff; ">
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
@endif
<!--announcement pane end-->
<hr>


@endsection


