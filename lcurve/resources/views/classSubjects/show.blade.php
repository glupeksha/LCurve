@extends('layouts.app')

@section('dash-left')

<div class="row">
        <div class="panel panel-default">
         <div class="panel-heading">
            <br>
            <label><b>Subject: </b></label>{{  $classSubject->classRoom->grade->name }} {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }}<br>
            <label><b>Teacher name: </b></label>{{  $classSubject->teacher->name }}<br>

            <div class="row">


                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                @can('Edit ClassSubject')
                <a href="{{ route('classSubjects.edit', $classSubject->id) }}" class="btn btn-info" role="button">Edit</a>
                @endcan

                @can('Delete ClassSubject')
                <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                @endcan
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
                                            {!! Form::submit('OK',array('class' => 'okbtnstyle')) !!}
                                        </div>
                                      </div>
                                      {!! Form::close() !!}
                                    </div>
                                  </div>
                <!-- Modal - end -->
            </div>

            <hr style="border-color:#848991">
            <h4>Lesson Plan</h4>

            <div class="list-group">

              <ol class="sortable" >
                @foreach($classSubject->maintopics() as $topic)
                  @include('topics/plug_index',['topic'=>$topic])
                @endforeach
              </ol>

            </div>

              {{ Form::open(array('action' => array('TopicController@store',$classSubject))) }}
              {{ Form::text('name', null, array('class' => 'form-control','placeholder' => 'Add a new topic')) }}
              {{ Form::button('<i class="material-icons">add</i>', array('type' => 'submit', 'class' => 'btn-floating waves-effect waves-light')) }}
              {{ Form::close() }}

        </div>
        <div class="panel-body">
          
        </div>
    </div>



</div>

@endsection

@push('styles')
  <link href = "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
     rel = "stylesheet">

  <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="{{asset('js/jquery.mjs.nestedSortable.js')}}"></script>

  <script>
     $(function() {
        $( ".sortable" ).nestedSortable(
          {
  				forcePlaceholderSize: true,
  				handle: 'div',
  				helper:	'clone',
  				items: 'li',
  				opacity: .6,
  				placeholder: 'placeholder',
  				revert: 250,
  				tabSize: 25,
  				tolerance: 'pointer',
  				toleranceElement: '> div',
  				maxLevels: 4,
  				isTree: true,
  				expandOnHover: 700,
  				startCollapsed: false,
          startDepthCount: 0,
  				relocate: function(){
            arr=$('.sortable').nestedSortable('serialize', {startDepthCount: 0});
            $("#display").html(JSON.stringify(arr));

            $.ajax({
                url: '/updatesequence',
                type: 'GET',
                data: arr,
                success: function(response)
                {
                  //  $('#display').html(response);
                }
            });

  					console.log('Relocated item');
  				}
			  });
     });

  </script>
@endpush
