@extends('layouts.admin.app')

@section('dash-left')

<div class='col-lg-8 col-lg-offset-2'>

    <h3><i class='fa fa-user-plus'></i> Add User</h3>
    <hr style="border-color:#848991">


    {{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::label($role->name, ucfirst($role->name)) }}
            @if ($role->id==3)
              {{ Form::checkbox('roles[]',  $role->id ,false,array('id'=>'ChStudent','data-toggle'=>'collapse','data-target'=>'#setGrade')) }}
            @else
              {{ Form::checkbox('roles[]',  $role->id ,false) }}
            @endif
            <br>
        @endforeach
    </div>

    <div id="setGrade" class="form-group collapse">
      Class @include('layouts.search',$searchableList)
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>
    <div class="col-lg-10"></div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary' ,'style'=>'background-color: #0b9b7e')) }}

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
