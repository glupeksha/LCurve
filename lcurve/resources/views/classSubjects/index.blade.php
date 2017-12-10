@extends('layouts.app')

@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">

            <h3>Subjects For Class</h3>
            </div>
            @foreach ($classSubjects as $classSubject)
                <div class="col-lg-1 "></div>
                    <a href="{{ route('classSubjects.show', $classSubject->id ) }}" class="list-group-item" >
                        <div class="col-lg-offset-1">
                        <b>                         
                        {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }}                    
                        </b>
                        </div>
                    </a>
            @endforeach

        </div>

        <div class="text-center">
            {!! $classSubjects->links() !!}
        </div>
    </div>
</div>

<!--starts Add society permissions-->
@if(Auth::User()->can('Create ClassSubject') || Auth::User()->can('Create ClassSubject '.$classSubject->id))
<div class="col-lg-8"></div>
    <a href="{{ route('classSubjects.create') }}" class="btn btn-success " role="button" >Add Subject For a Class</a>
@endif
<!--starts Add society permissions-->

@endsection
