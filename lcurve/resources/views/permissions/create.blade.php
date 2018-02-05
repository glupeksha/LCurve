@extends('layouts.app')
@section('dash-left')

<div class='col-lg-4 col-lg-offset-4'>
    <h3><i class='fa fa-key'></i>@lang('applang.addPermission')</h3>
    <hr style="border-color:#848991">

    {{ Form::open(array('url' => 'permissions')) }}
        <div class="form-group">
            {{ Form::label('name', Lang::get('applang.NameReg')) }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>
        <br>
        @if(!$roles->isEmpty()) <!--If no roles exist yet-->
            <h4>@lang('applang.permissionRoles')</h4>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
            @endforeach
        @endif
        <br>
        {{ Form::submit(Lang::get('applang.addNew'), array('class' => 'btn btn-success')) }}

    {{ Form::close() }}

</div>

@endsection
