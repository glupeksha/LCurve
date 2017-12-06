@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Lessons</h3>
            </div>
             <div class="panel-heading" style="background-color: #d9dbaa; border-color: #d9dbaa !important">Page {{ $lessons->currentPage() }} of {{ $lessons->lastPage() }}
            </div>
            @foreach ($lessons as $lesson)
                <div class="panel-body">  
                <div class="col-lg-1"></div> 
                        <div class="row"> 

                        <a href="{{ route('lessons.show', $lesson->id ) }}"><b>{{ $lesson->title }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $lesson->created_at }}</b><br>
                        </a>
                        </div>

                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $lessons->links() !!}
        </div>
    </div>
</div>


@endsection