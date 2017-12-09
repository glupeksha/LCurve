@extends('layouts.app')

@section('dash-left')

<h3 class="page-title">Edit Topic</h3>
    
    {!! Form::model($topic, ['method' => 'PUT', 'route' => ['quizzTopics.update', $topic->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            edit
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Enter Topic ID*', ['class' => 'control-label']) !!}
                    {!! Form::select('name',$topics,old('name'), ['class' => 'form-control'])!!}
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

    {!! Form::submit('update', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection