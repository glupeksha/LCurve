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
                	 <div class="subject_icon" style="height:100px; width:100px; background-color: blue;">
                      <img src="data:image/png;base64,{{chunk_split(base64_encode($subject->image)) }}"/>

                      
                      
                          
                        
                      </div>
                      <div>
                      	{{$subject->title}}
                      </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>

@endsection