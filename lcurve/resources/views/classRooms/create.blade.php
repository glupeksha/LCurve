@extends('layouts.app')

@section('dash-left')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>@lang('applang.createNewClassRoom')</h3>
         <hr style="border-color:#848991">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'classRooms.store')) }}

        <div class="form-group">
          {{ Form::label('name', Lang::get('applang.gradeGiven')) }}
          @include('layouts.search',$searchableList)

            <br>
            {{ Form::label('name', Lang::get('applang.nameOfTheClass')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}

            <br>

            {{ Form::submit(Lang::get('applang.createClassRoom'), array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

@endsection
