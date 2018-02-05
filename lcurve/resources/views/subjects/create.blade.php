@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>@lang('applang.createNewSubject')</h3>
        <hr class="hr_style">

        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'subjects.store', 'files'=>'true')) }}

            <div class="form-group">
                {{ Form::label('name', Lang::get('applang.NameReg')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                <br>


                {{ Form::label('image', Lang::get('applang.subjectImage')) }}
                {{ Form::file('image', null, array('class' => 'form-control')) }}
                <br>

                 {{ Form::label('color', Lang::get('applang.colorSub')) }}
                {{ Form::color('color', null, array('class' => 'form-control')) }}
                <br>

                {{ Form::submit(Lang::get('applang.createSubject'), array('class' => 'btn btn-success btn-lg btn-block')) }}
            </div>
        {{ Form::close() }}

    </div>
</div>

@endsection
