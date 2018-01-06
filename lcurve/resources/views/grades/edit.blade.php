@extends('layouts.app')
@if(Auth::User()->can('View Edit Grade') || Auth::User()->can('View Edit Grade'.$grade->id)) 

@section('dash-left')

<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>@lang('applang.editGrade')</h3>
        <hr class="hr_style">
            {{ Form::model($grade, array('route' => array('grades.update', $grade->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', Lang::get('applang.gradeGiven')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

            <div class="col-lg-10"></div>
            {{ Form::submit(Lang::get('applang.saveSub'), array('class' => 'btn btn-primary','style'=>'background-color: #0b9b7e')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection

@endif

