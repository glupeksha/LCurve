<!--Only authorized users can view-->
@extends('layouts.app')
@section('dash-left')
@if(Auth::User()->can('View Create Society'))
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h3>Create New Society</h3>
        <hr style="border-color:#848991">

        
        {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'societies.store')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}

            <br>

            {{ Form::label('content', 'Society About Us') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}

            <br>

            {{ Form::label('subscribe', 'Subscribe content') }}
            {{ Form::textarea('subscribe', null, array('class' => 'form-control')) }}

            <br>

            {{ Form::label('color', 'Color') }}
            {{ Form::select('color',$colors, array('class' => 'form-control')) }}

            <br>

            {{ Form::submit('Create Society', array('class' => 'btn btn-success btn-lg btn-block')) }}
        </div>
        {{ Form::close() }}
        
        </div>
    </div>
@endif
@endsection
