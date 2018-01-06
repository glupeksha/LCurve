@extends('layouts.app')

@section('dash-left')

<div class='col-lg-8 col-lg-offset-2'>

    <h3><i class='fa fa-user-plus'></i>@lang('applang.edit') {{$user->name}}</h3>
    <hr style="border-color:#848991">


    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', Lang::get('applang.NameReg')) }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', Lang::get('applang.emailReq')) }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>@lang('applang.giveRole')</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::label($role->name, ucfirst($role->name)) }}
            @if ($role->id==3)
              {{ Form::checkbox('roles[]',  $role->id ,$user->roles,array('id'=>'ChStudent','data-toggle'=>'collapse','data-target'=>'#setGrade')) }}
            @else
              {{ Form::checkbox('roles[]',  $role->id ,$user->roles) }}
            @endif
            <br>
        @endforeach
    </div>
    <div id="setGrade" class="form-group collapse">
      Class @include('layouts.search',$searchableList)
    </div>
    <div class="form-group">
        {{ Form::label('password', Lang::get('applang.passwordReg')) }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', Lang::get('applang.confirmPassword')) }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
    <div class="col-lg-9"></div>
    @if ($user->hasRole('Student'))
      {{ Form::submit('Next', array('class' => 'btn btn-primary' ,'style'=>'background-color: #0b9b7e')) }}
    @else
      {{ Form::submit(Lang::get('applang.addNew'), array('class' => 'btn btn-primary' ,'style'=>'background-color: #0b9b7e')) }}
    @endif

    {{ Form::close() }}

</div>

@endsection
@push('scripts')

<script >
$(function setGrade() {
  if($("#ChStudent").prop('checked') == true){
    $("#setGrade").addClass("show");
  }
})

</script>
@endPush
