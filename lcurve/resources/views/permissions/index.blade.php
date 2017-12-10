@extends('layouts.admin.app')

@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">

    <h3><i class="fa fa-key"></i>Permissions Management</h3>
      <ul class="nav nav-tabs">
        <li><a href="{{url('permissions/view/Society')}}">Societies</a></li>
        <li><a href="{{url('permissions/view/Sport')}}">Sports</a></li>
        <li><a href="{{url('permissions/view/ClassRoom')}}">ClassRooms</a></li>
      </ul>

    <br>
    @include('permissions.plug_permissible',[$permissions])
    
    <!--starts set permissions-->
    @if(Auth::User()->can('Create Permission'))
    <div class="col-lg-9"></div>
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
    @endif
</div>

@endsection
