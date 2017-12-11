@extends('layouts.app')

@section('dash-left')
  <div class="row">
            <h3>Subjects</h3>
            <hr style="border-color:#848991">

              @foreach ($classSubjects as $classSubject)

                <div class="col-lg-2 subjects">
  								<a href="{{ route('classSubjects.show', $classSubject->id ) }}">
                  	<div class="subject_icon">
                      <img src="{{$classSubject->subject()->first()->image}}"/>
                    </div>
                  </a>
                  <div>
                    {{$classSubject->subject()->first()->name}}
                  </div>
                </div>

              @endforeach


  </div>
<!--starts Add society permissions-->
@if(Auth::User()->can('Create ClassSubject'))
  <div class="col-lg-8"></div>
  <a href="{{ route('classSubjects.create') }}" class="btn btn-success panel-styles" role="button" >Add Subject For a Class</a>
@endif
<!--starts Add society permissions-->

@endsection
