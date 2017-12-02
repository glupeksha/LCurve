@extends('layouts.app')
@section('dash-left')

<div id="homework" class="col-lg-12 notify_cr" style="margin-bottom: 20px;">
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

<div id="homework" class="col-lg-12 notify_cr" style="margin-bottom: 20px;">
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

    <div id="homework" class="col-lg-12 notify notify_cr">
    <div class="col-lg-12 notify_head notify_head_cr">
        <div class="col-lg-3 notify_indi notify_indi_cr">
            Announcements
        </div>
        <div class="col-lg-7"></div>

    </div>  

    <hr>
    <div class="raw">
    <div class="col-lg-12 notify_body notify_body_cr">
    
    </div>
    </div>
</div> 
    <hr>

   


@endsection