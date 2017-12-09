@extends('layouts.admin.app')
@section('dash-left')

<div class='col-lg-4 col-lg-offset-4'>
    <h3><i class='fa fa-key'></i> Edit {{$permission->name}}</h3>
    <hr style="border-color:#848991">

    <br>
    {{ Form::model($permission, array('action' => array('PermissionViewController@addUser', $permission), 'method' => 'POST')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', 'Permission Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        @include('layouts.search',[$searchableList])
        <br>

        {{ Form::submit('Add User', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
