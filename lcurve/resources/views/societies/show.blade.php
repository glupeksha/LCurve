@extends('layouts.app')
@section('dash-left')

<div id="homework" class="col-lg-12 notify notify_cr">
    <div class="col-lg-12 notify_head notify_head_cr">
        <div class="col-lg-3 notify_indi notify_indi_cr">
            About Us
        </div>
        <div class="col-lg-7"></div>
        @can('Edit Announcement')
        <a href="{{ route('societies.edit', $society->id) }}" class="btn btn-info glyphicon glyphicon-plus-sign " role="button" style="width: 100px; height: 30px;">Edit</a>
        @endcan

            
    </div>  

    <hr>
    <div class="raw">
    <div class="col-lg-12 notify_body notify_body_cr">
    <p class="lead">{{ $society->content }} </p>
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

        @can('Edit Announcement')
        <a href="{{ route('societies.edit', $society->id) }}" class="btn btn-info glyphicon glyphicon-plus-sign" role="button" style="width: 100px  height: 30px;">Edit</a>
        @endcan

    </div>  

    <hr>
    <div class="raw">
    <div class="col-lg-12 notify_body notify_body_cr">
    
    </div>
    </div>
</div> 
    <hr>

    {!! Form::open(['method' => 'DELETE', 'route' => ['societies.destroy', $society->id] ]) !!}
    
    @can('Edit Society')
    <a href="{{ route('societies.edit', $societies->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Society')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}



@endsection