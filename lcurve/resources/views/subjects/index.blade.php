@extends('layouts.app')
@section('dash-left')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Subjects</h2>

                 @foreach ($subjects as $subject)
                 <div class="panel-body">
                    <div class="col-lg-2 subjects">
											<a href="{{ route('subjects.show', $subject->id ) }}">
                	 		<div class="subject_icon">
                      <img src="{{$subject->image}}"/>
                      </div>
                      <div>
                      {{$subject->name}}
                      </div>
                    </div>
									</a>
            		</div>
                @endforeach
        </div>
    </div>
    </div>
    </div>

@endsection
