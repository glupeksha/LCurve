@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>@lang('applang.editSport')</h3>

        <hr class="hr_style">
        {{ Form::model($sport, array('route' => array('sports.update', $sport->id), 'method' => 'PUT', 'files'=>'true')) }}
            <div class="form-group">
                {{ Form::label('name', Lang::get('applang.NameReg')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

                {{ Form::label('content', Lang::get('applang.aboutUs')) }}
                {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>


                {{ Form::label('subscribe', 'Who can subscribe') }}
                {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}<br>


                {{ Form::label('color', Lang::get('applang.colorSub')) }}
                {{ Form::text('color', null, array('class' => 'form-control')) }}<br>

                <div class="col-lg-10"></div>

                {{ Form::submit(Lang::get('applang.saveSub'), array('class' => 'btn btn-success','style'=>'background-color: #0b9b7e')) }}
            </div>
        {{ Form::close() }}        
    </div>
</div>

@endsection
