@extends('layouts.admin.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Class Rooms</h3>
            </div>

            @foreach ($classRooms as $classRoom)

             <div class="panel-body panel-heading"> 
                <div class="panel-body">    
                    <div class="col-lg-1"></div>               
                    <a href="{{ route('classRooms.show', $classRoom->id ) }}">
                        <b>{{ $classRoom->grade->name }} 

                        - {{ $classRoom->name }} </b>
                        <br>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
        <div class="text-center">
            {!! $classRooms->links() !!}
        </div>

        @can('Create ClassRoom')
        <div class="col-lg-9"></div>
            <a href="{{ route('classRooms.create') }}" class="btn btn-success" role="button" >Add ClassRoom
        </a>
        @endcan

@endsection
