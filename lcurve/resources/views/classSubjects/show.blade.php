@extends('layouts.app')

@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
         <div class="panel-body panel-heading">
            <br>
            <label><b>Subject: </b></label>{{  $classSubject->classRoom->grade->name }} {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }}<br>
            <label><b>Teacher name: </b></label>{{  $classSubject->teacher->name }}<br>
            <hr style="border-color:#848991">
            <h4>Lesson Plan</h4>
            <div class="list-group">
              <ol >
                @foreach($classSubject->topics as $topic)
                  <li><a href="#" class="list-group-item">{{$topic->name}}</a></li>
                @endforeach
              </ol>
            </div>



              {{ Form::open(array('action' => array('TopicController@store',$classSubject))) }}
              {{ Form::text('name', 'Add Topic', array('class' => 'form-control')) }}
              {{ Form::submit('Add Topic', array('class' => 'btn btn-success btn-lg btn-block')) }}
              {{ Form::close() }}



            <div class="row">

              <div class="col-lg-8"></div>
                {!! Form::open(['method' => 'DELETE', 'route' => ['classSubjects.destroy', $classSubject->id] ]) !!}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                @can('Edit ClassSubject')
                <a href="{{ route('classSubjects.edit', $classSubject->id) }}" class="btn btn-info" role="button">Edit</a>
                @endcan
                
                @can('Delete ClassSubject')
                  <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                 @endcan
           
            </div>
        </div>
        
    </div>

</div>
 
</div>
<!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['classSubjects.destroy', $classSubject->id] ]) !!}
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h5 class="modal-title">Are you sure you want to delete?</h5>
                        </div>

                        <div class="modal-footer">          
                            {!! Form::submit('OK') !!}

                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
        <!-- Modal - end -->
@endsection

