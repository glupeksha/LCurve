@extends('layouts.app')

@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">

            <h3>Subjects For Class</h3>
            </div>

            <div class="panel-body panel-styles" >

            @foreach ($classSubjects as $classSubject)

                <div class="panel-body panel-heading">
                <div class="col-lg-1"></div>
                        <a href="{{ route('classSubjects.show', $classSubject->id ) }}" ><b>
                          {{  $classSubject->subject->name }}
                        </b><br>
                        </a>
                </div>
                <!--starts Add society permissions-->
                @if(Auth::User()->can('Create ClassSubject') || Auth::User()->can('Create ClassSubject '.$classSubject->id))
                  <div class="col-lg-8"></div>
                  <a href="{{ route('classSubjects.create') }}" class="btn btn-success panel-styles" role="button" >Add Subject For a Class</a>
                @endif
                <!--starts Add society permissions-->
            @endforeach
        </div>

    </div>
</div>


</div>

@endsection
