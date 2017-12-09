@extends('layouts.app')
@section('dash-left')

<div class='col-lg-4 col-lg-offset-4'>
    <h3><i class='fa fa-key'></i> Edit {{$permission->name}}</h3>
    <hr style="border-color:#848991">

    <br>
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', 'Permission Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <br>
        <div class="col-lg-offset-9">
        {{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
        </div>
    {{ Form::close() }}

</div>

@endsection