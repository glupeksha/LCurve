@extends('layouts.app')
@section('dash-left')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>@lang('applang.sportsBar')</h3>
            </div>

            <div class="panel-body">
                @foreach ($sports as $sport)
                    <div class="row">

                    <!--society name load start-->
                        <div class="col-lg-8">
                            {{--<button class="buttonstyles">--}}
                                  <a href="{{ route('sports.show', $sport->id ) }}" class="list-group-item"><b>{{ $sport->name }}</b></a>
                            {{--</button>--}}
                        </div>
                        <!--society name load end-->
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
                @endforeach

        </div>
        <div class="text-center">
            {!! $sports->links() !!}
        </div>
    </div>
</div>


<!--starts Add sports permissions-->
@if(Auth::User()->can('Create Sport'))
<div class="col-lg-8"></div>
    <a href="{{ route('sports.create') }}" class="btn btn-success" role="button" >@lang('applang.addNewSport')</a>
@endif
<!--Ends Add sports permissions-->

@endsection
