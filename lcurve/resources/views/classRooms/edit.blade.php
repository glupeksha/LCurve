@extends('layouts.app')

@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>@lang('applang.editClassRoom')</h3>
         <hr style="border-color:#848991">
            {{ Form::model($classRoom, array('route' => array('classRooms.update', $classRoom->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('grade_id', Lang::get('applang.gradeGiven')) }}
            {{ Form::text('grade_id', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('name', Lang::get('applang.nameOfTheClass')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

        <div class="col-lg-10"></div>
            {{ Form::submit(Lang::get('applang.saveSub'), array('class' => 'btn btn-success')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
