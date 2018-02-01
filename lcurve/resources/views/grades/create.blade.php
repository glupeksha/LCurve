@extends('layouts.app')
@if(Auth::User()->can('Create Grade')) 

@section('dash-left')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>@lang('applang.createNewGrade')</h3>
            <hr class="hr_style">

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'grades.store')) }}

                <div class="form-group">
                    {{ Form::label('name', Lang::get('applang.gradeGiven')) }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                    <br>
                    {{ Form::submit(Lang::get('applang.createGrade'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
    

@endsection

@endif

