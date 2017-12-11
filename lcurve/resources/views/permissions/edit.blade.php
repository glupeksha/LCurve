@extends('layouts.admin.app')
@section('dash-left')

<div class='col-lg-8 col-lg-offset-2'>
    <h3><i class='fa fa-key'></i> Edit {{$permission->name}}</h3>
    <hr style="border-color:#848991">

    <br>
    {{ Form::model($permission, array('action' => array('PermissionViewController@addUser', $permission), 'method' => 'POST')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', 'Permission Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        {{ Form::label('name', 'Name of User') }}
        @include('layouts.search',[$searchableList])
        <br>
        <div class="col-lg-9"></div>
        {{ Form::submit('Add User', array('class' => 'btn btn-success')) }}

    {{ Form::close() }}

</div>

@endsection
