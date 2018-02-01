@extends('layouts.app')

@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">
    <h3><i class="fa fa-users"></i>@lang('applang.userAdministration')</h3>
    <ul class="nav nav-tabs">
      <li><a href="{{url('users/view/Teacher')}}">@lang('applang.teachers')</a></li>
      <li><a href="{{url('users/view/Student')}}">@lang('applang.students')</a></li>
      <li><a href="{{url('users/view/Admin')}}">@lang('applang.admins')</a></li>
    </ul>
<br>

  @include('users.plug_index',[$users])
  <!--starts add user permissions-->
  @if(Auth::User()->can('Create User'))
  <div class="col-lg-10"></div>
  <a href="{{ route('users.create') }}" class="btn btn-success">@lang('applang.addUser')</a>
  @endif
</div>

@endsection
