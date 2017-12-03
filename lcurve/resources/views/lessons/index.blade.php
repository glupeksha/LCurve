@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Lessons</h3>
            </div>
            <div class="panel-heading">Page {{ $lessons->currentPage() }} of {{ $lessons->lastPage() }}
            </div>
            @foreach ($lessons as $lesson)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('lessons.show', $lesson->id ) }}"><b>{{ $lesson->title }}</b><br>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $lessons->links() !!}
        </div>
    </div>
</div>


@endsection