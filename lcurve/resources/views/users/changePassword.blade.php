@extends('layouts.admin.app')

@section('dash-left')
	<div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h3>Change Password</h3>
            <hr class="hr_style">

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('action' => 'UserController@changePassword')) }}
        		
            <div class="form-group">
                {{ Form::label('password', 'New Password') }}
                {{ Form::password('password', null, array('class' => 'form-control')) }}
                <br>


                {{ Form::label('confirm_password', 'Subject Name') }}
                {{ Form::password('confirm_password', null, array('class' => 'form-control')) }}
                <br>
                

                {{ Form::submit('Change Password', array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }} 
            </div>

        </div>
    </div>
@endsection