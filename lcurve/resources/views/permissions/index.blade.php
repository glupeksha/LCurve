@extends('layouts.app')

@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">

    <h3><i class="fa fa-key"></i>@lang('applang.permissionsManagement')</h3>
      <ul class="nav nav-tabs">
        <li><a href="{{url('permissions/view/Society')}}">@lang('applang.societiesBar')</a></li>
        <li><a href="{{url('permissions/view/Sport')}}">@lang('applang.sportsBar')</a></li>
        <li><a href="{{url('permissions/view/ClassRoom')}}">@lang('applang.classRoomBar')</a></li>
      </ul>

    <br>
    @include('permissions.plug_permissible',[$permissions])

    <!--starts set permissions-->
    @if(Auth::User()->can('Create Permission'))
    <div class="col-lg-9"></div>
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">@lang('applang.addPermission')</a>
    @endif
</div>

@endsection
