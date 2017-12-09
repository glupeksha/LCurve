@extends('layouts.app')

@section('dash-left')
 <h3 class="page-title">Create Topic</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['quizzTopics.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            create
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::select('name', $topics,old('name'), ['class' => 'form-control'])!!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit('save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection