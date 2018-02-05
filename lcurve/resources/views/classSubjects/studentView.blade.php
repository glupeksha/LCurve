@extends('layouts.app')
@section('dash-left')

	<label><b> Subject: </b></label> <span>  {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }} </span><br>
            <label><b>Teacher name: </b></label> <span> {{  $classSubject->teacher->name }} </span>

	<div class="panel-body">
         
          <br>
            @foreach($classSubject->maintopics() as $topic)
              @include('topics/plug_show',['topic'=>$topic])
            @endforeach

  </div>
	@foreach ($classSubject->downloads()->get() as $download)
		@include('downloads.plug_index',[$download])
	@endforeach
@endsection

