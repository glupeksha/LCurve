@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Class Rooms</h3>
            </div>
            <div class="panel-heading">Page {{ $classRooms->currentPage() }} of {{ $classRooms->lastPage() }}
            </div>
            @foreach ($classRooms as $classRoom)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('classRooms.show', $classRoom->id ) }}">
                        <b>{{ $classRoom->grade->name }} 
                        - {{ $classRoom->name }} </b>
                        <br>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            
        </div>
    </div>
</div>
<div class="text-center">
            {!! $classRooms->links() !!}
        </div>

@can('Create ClassRoom')
    <a href="{{ route('classRooms.create') }}" class="btn btn-info" role="button">Add ClassRoom</a>
    @endcan


@endsection