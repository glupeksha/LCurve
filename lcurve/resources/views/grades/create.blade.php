@extends('layouts.admin.app')
@section('dash-left')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Create New Section</h3>
            <hr class="hr_style">

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'grades.store')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Grade') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                    <br>
                    {{ Form::submit('Create Grade', array('class' => 'btn btn-success btn-lg btn-block')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
