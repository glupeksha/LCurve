@extends('layouts.admin.app')

@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">
    <h3><i class="fa fa-users"></i> User Administration</h3>
    <ul class="nav nav-tabs">
      <li><a href="{{url('users/view/Teacher')}}">Teachers</a></li>
      <li><a href="{{url('users/view/Student')}}">Students</a></li>
      <li><a href="{{url('users/view/Admin')}}">Admins</a></li>
    </ul>
<br>

  @include('users.plug_index',[$users])
  <!--starts add user permissions-->
  @if(Auth::User()->can('Create User'))
  <div class="col-lg-10"></div>
  <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
  @endif
</div>

@endsection
