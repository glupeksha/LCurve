@extends('layouts.app')
@section('dash-left')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h3>@lang('applang.editAboutUs')</h3>
        <hr style="border-color: {{ $society->color }};">
            {{ Form::model($society, array('route' => array('societies.update', $society->id), 'method' => 'PUT')) }}
        <div class="form-group">
            {{ Form::label('name', Lang::get('applang.societyBar')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('content', Lang::get('applang.aboutUs')) }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>


            {{ Form::label('subscribe', Lang::get('applang.whoCanSubscribe')) }}
            {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}<br>

             {{ Form::label('color', Lang::get('applang.colorSub')) }}
            {{ Form::text('color', null, array('class' => 'form-control')) }}<br>


            {{ Form::submit(Lang::get('applang.saveSub'), array('class' => 'btn btn-success','style'=>'background-color: #0b9b7e')) }}


            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection