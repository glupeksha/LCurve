@extends('layouts.app')
@section('dash-left')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>@lang('applang.sportsBar')</h3>
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

                                <!--starts sports edit permissions-->
                                @if(Auth::User()->can('Edit Sport') || Auth::User()->can('Edit Sport '.$sport->id))
                                <a href="{{ route('sports.edit', $sport->id) }}" class="btn btn-success" role="button">@lang('applang.edit')</a>
                                @endif

                                <!--starts sports edit permissions-->
                                @if(Auth::User()->can('Delete Sport') || Auth::User()->can('Delete Sport '.$sport->id))
                                  {!! Form::submit(Lang::get('applang.delete'),['class'=>'btn btn-success']) !!}
                                @endif

                            {!! Form::close() !!}
                        <!--edit delete buttons start-->
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>

    </div>
</div>


<!--starts Add sports permissions-->
@if(Auth::User()->can('Create Sport'))
<div class="col-lg-8"></div>
    <a href="{{ route('sports.create') }}" class="btn btn-success panel-styles" role="button" >@lang('applang.addNewSport')</a>
@endif
<!--Ends Add sports permissions-->

@endsection
