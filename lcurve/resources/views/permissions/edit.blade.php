@extends('layouts.app')
@section('dash-left')

<div class='col-lg-8 col-lg-offset-2'>
    <h3><i class='fa fa-key'></i> @lang('applang.edit') {{$permission->name}}</h3>
    <hr style="border-color:#848991">

    <br>
    {{ Form::model($permission, array('action' => array('PermissionViewController@addUser', $permission), 'method' => 'POST')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', Lang::get('applang.permissionName')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        {{ Form::label('name', Lang::get('applang.nameUser')) }}
        @include('layouts.search',[$searchableList])
        <br>
        <div class="col-lg-9"></div>
        {{ Form::submit(Lang::get('applang.addUserss'), array('class' => 'btn btn-success')) }}

    {{ Form::close() }}

</div>

@endsection
