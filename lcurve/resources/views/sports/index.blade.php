@extends('layouts.app')
@section('dash-left')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Sports</h3>
            </div>

            <div class="panel-body">
                @foreach ($sports as $sport)                
                    <div class="row">
                    <!--sport name pane start-->
                        <div class="col-lg-7">
                            {{--<button class="buttonstyles">--}}
                            <a href="{{ route('sports.show', $sport->id ) }}">
                                <b>{{ $sport->name }}</b>
                            </a>
                            {{--</button>--}}
                        </div>
                    <!--sport name pane start-->
                    <!--edit delete buttons start-->
                        <div class="col-lg-4">
                            {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['sports.destroy', $sport->id] ]) !!}                 
                                @can('Edit Sport')
                                <a href="{{ route('sports.edit', $sport->id) }}" class="btn btn-success" role="button">Edit</a>
                                @endcan
                                
                                @can('Delete Sport')                               
                                  {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                                @endcan
                            {!! Form::close() !!}
                    <!--edit delete buttons start-->
                        </div>
                    </div>
                    <br>             
                @endforeach         
            </div>
        </div>
        <div class="text-center">
            {!! $sports->links() !!}
        </div>
    </div>
</div>

@endsection
