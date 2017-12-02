@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Class Rooms</h3>
            </div>
            <div class="panel-heading">Page {{ $classRoom->currentPage() }} of {{ $classRoom->lastPage() }}
            </div>
            @foreach ($classRoom as $classRoom)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('classRooms.show', $classRoom->id ) }}"><b>{{ $classRoom->grade }} - {{ $classRoom->name }} </b><br>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            
        </div>
    </div>
</div>


@endsection