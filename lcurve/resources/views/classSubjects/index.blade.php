@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Subjects For Class</h3>
            </div>
            <div class="panel-heading">Page {{ $classSubjects->currentPage() }} of {{ $classSubjects->lastPage() }}
            </div>
            @foreach ($classSubjects as $classSubject)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('classSubjects.show', $classSubject->id ) }}"><b>
                        {{  $classSubject->classRoom->grade->name }} {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }}
                        </b><br> 
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $classSubjects->links() !!}
        </div>
    </div>
</div>
@can('Create ClassSubject')
    <a href="{{ route('classSubjects.create') }}" class="btn btn-info" role="button">Add Subject For a Class</a>
    @endcan


@endsection