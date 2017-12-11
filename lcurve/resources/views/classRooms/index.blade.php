@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Class Rooms</h3>
            </div>

            @foreach ($classRooms as $classRoom)
                <div class="col-lg-1 "></div>
                    <a href="{{ route('classRooms.show', $classRoom->id ) }}" class="list-group-item" >
                        <div class="col-lg-offset-1">
                        <b>                         
                        {{ $classRoom->name }}                      
                        </b>
                        </div>
                    </a>
            @endforeach
        </div>

    </div>
</div>
        <div class="text-center">
            {!! $classRooms->links() !!}
        </div>

        <!--starts Add society permissions-->
        @if(Auth::User()->can('Create ClassRoom') || Auth::User()->can('Create ClassRoom '.$classRoom->id))
        <div class="col-lg-9"></div>
            <a href="{{ route('classRooms.create') }}" class="btn btn-success" role="button" >Add ClassRoom
        </a>
        @endif
        <!--starts Add society permissions-->

@endsection
