@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
            
                <h3>Subjects For Class</h3>
            </div>

            <div class="panel-heading" style="background-color: #d9dbaa; border-color: #d9dbaa !important">Page {{ $classSubjects->currentPage() }} of {{ $classSubjects->lastPage() }}
            </div>

            @foreach ($classSubjects as $classSubject)
                <div class="panel-body panel-heading"> 
                <div class="col-lg-1"></div>                  
                        <a href="{{ route('classSubjects.show', $classSubject->id ) }}" style="font-family:sans-serif;"><b>
                        {{  $classSubject->classRoom->grade->name }} {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }}
                        </b><br> 
                        </a>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $classSubjects->links() !!}
        </div>
    </div>
</div>

@can('Create ClassSubject')
<div class="col-lg-8"></div>
    <a href="{{ route('classSubjects.create') }}" class="btn btn-info" role="button" style="background-color: #0b9b7e;border-color: #0b9b7e;">Add Subject For a Class</a>
@endcan


@endsection