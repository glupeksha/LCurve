@extends('layouts.app')
@section('dash-left')


	<h3><span> &nbsp; &nbsp;{{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }} </span><br></h3>
            <label><b>&nbsp; &nbsp;&nbsp;&nbsp;Teacher name: </b></label> <span> {{  $classSubject->teacher->name }} </span>


	<div class="panel-body">

            @foreach($classSubject->maintopics() as $topic)
              @include('topics/plug_show',['topic'=>$topic])
            @endforeach

    </div>
@endsection