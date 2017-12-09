@extends('layouts.app')

@extends('layouts.app')

@section('dash-left')

<div class="panel-group">
    
    <div class="panel-primary">
      <h3>Profile Details</h3>
     <div class="panel-body">
                    <div class= "panel panel-info" style="border-color:#bbbe64 ;border-width: 2px; ">                    
                        
                        <div class="panel-body" >
                          <div class="container col-lg-11">
                            <div class="list-group">
                              <li class="list-group-item"><p><b>Name: </b> {{Auth::user()->name}}</p></li>
                              <li class="list-group-item"><p><b>Email: </b> {{Auth::user()->email}}</p></li>
                              <li class="list-group-item"><p><b>Language: </b> {{Auth::user()->language}}</p></li>
                            </div>
                          </div>
                           
                        </div>                 
                    </div>
                </div>
<div class="row">

    <div class="col-lg-8" ></div>
    @can('Edit Profile')
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success" role="button">Edit</a>
    @endcan


     
    {!! Form::close() !!}
</div>
</div>
</div>
@endsection





