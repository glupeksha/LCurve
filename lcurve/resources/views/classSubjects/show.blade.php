@extends('layouts.app')
@section('dash-left')

<div class="row">
        <div class="panel panel-default">
         <div class="panel-heading">
            <br>
            <label><b>Subject: </b></label> <span> {{  $classSubject->classRoom->grade->name }} {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }} </span><br>
            <label><b>Teacher name: </b></label> <span> {{  $classSubject->teacher->name }} </span>
            <br>

            <div class="row">
              {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['classSubjects.destroy', $classSubject->id] ]) !!}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                @can('Edit ClassSubject')
                <a href="{{ route('classSubjects.edit', $classSubject->id) }}" class="btn btn-info" role="button">Edit</a>
                @endcan

                @can('Delete ClassSubject')
                  {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                @endcan

              {!! Form::close() !!}
            </div>

            <hr style="border-color:#848991">
            <h5>Lesson Plan</h5>

            <div class="list-group">

              <ol class="sortable" style="list-style-position: inside;">
                @foreach($classSubject->maintopics() as $topic)
                  @include('topics/plug_index',['topic'=>$topic])
                @endforeach
              </ol>

            </div>

              {{ Form::open(array('action' => array('TopicController@store',$classSubject))) }}
              <div class="row">
                <div class="col-lg-11">
                  {{ Form::text('name', null, array('class' => 'form-control','placeholder' => 'Add a new topic')) }}
                </div>
                <div class="col-lg-1">
                  {{ Form::button('<i class="material-icons">add</i>', array('type' => 'submit', 'class' => 'btn-floating waves-effect waves-light')) }}
                </div>

              </div>

              {{ Form::close() }}

        </div>

        <div class="panel-body">
          <h5>Lessons Preview</h5>
            @foreach($classSubject->maintopics() as $topic)
              @include('topics/plug_show',['topic'=>$topic])
            @endforeach

        </div>

    </div>

    <p id="display"></p>

</div>

@endsection

@push('styles')
  <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
  <script src = "{{ asset('js/materialize.min.js') }}"></script>

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
            $("#display").html(arr);
            $.ajax({
                url: '/updatesequence',
                type: 'GET',
                data: arr,
                success: function(response)
                {
                    //alert(response);
                    $('#display').html(response);

                }

            });
          
            tiny();
  					console.log('Relocated item');
  				}
			  });
     });

  </script>
  <script src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
  <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>

  function tiny() {
    @stack('tinycode')
  }
  tiny();

</script>
@endpush
