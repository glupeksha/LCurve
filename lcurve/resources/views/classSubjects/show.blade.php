@extends('layouts.app')
@section('dash-left')

<div class="row">
        <div class="panel panel-default" style="padding: 30px;">
         <div class="" >
            <br>
            <label><b> Subject: </b></label> <span> {{  $classSubject->classRoom->grade->name }} {{  $classSubject->classRoom->name }} - {{  $classSubject->subject->name }} </span><br>
            <label><b>Teacher name: </b></label> <span> {{  $classSubject->teacher->name }} </span>
            <br>
            <div class="col-lg-8"></div>
            <div class="row">
              {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['classSubjects.destroy', $classSubject->id] ]) !!}
                <a href="{{ url()->previous() }}" class="btn btn-success">Back</a>

                <!--starts subject edit permissions-->
                @if(Auth::User()->can('Edit ClassSubject') || Auth::User()->can('Edit ClassSubject '.$classSubject->id))
                <a href="{{ route('classSubjects.edit', $classSubject->id) }}" class="btn btn-success" role="button">Edit</a>
                @endif
                <!--ends subject edit permissions-->

                <!--starts subject delete permissions-->
                @if(Auth::User()->can('Delete ClassSubject') || Auth::User()->can('Delete ClassSubject '.$classSubject->id))

                  {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                @endif
                <!--ends subject delete permissions-->

              {!! Form::close() !!}
            </div>

            <hr style="border-color:#848991;border-width:2px;">
            <h4>Lesson Plan</h4>
            <br>
            <div class="list-group">

              <ol class="sortable" style="list-style-position: inside;">
                @foreach($classSubject->maintopics() as $topic)
                  @include('topics/plug_index',['topic'=>$topic])
                @endforeach
              </ol>

            </div>

              {{ Form::open(array('action' => array('TopicController@store',$classSubject), 'method' => 'post')) }}
              <div class="row">
                <div class="col-lg-11">
                  {{ Form::text('name', null, array('class' => 'form-control','placeholder' => 'Add a new topic')) }}
                </div>

                 <!--starts subject edit permissions-->
                 @if(Auth::User()->can('Create Topic') || Auth::User()->can('Create Topic '.$classSubject->id))


                <div class="col-lg-1">
                <input class=" glyphicon glyphicon-plus-sign button1 btn-success" type="submit" value="+">

                </div>
                @endif
                 <!--ends subject edit permissions-->

              </div>

              {{ Form::close() }}
<br>
<br>
<hr style="border-color:#848991;border-width:2px;">

        <!--Downloads starts -->
            <h4 >Downloads</h4>
            <div class="panel">
              {{-- Display downloads - Start --}}
                <div class="panel-heading">
                  @foreach($classSubject->downloads()->get() as $download)
                      @include('downloads.plug_index',[$download])
                  @endforeach
                </div>
              {{-- Display downloads - End --}}
              <div class="panel-body">
                <h5 >Add Downlaod</h5>
                <div>
                  @include('downloads.plug_create')
                </div>
              </div>
            </div>


        <!--Downloads ends -->
        </div>
<hr style="border-color:#848991;border-width:2px;">

       <div class="panel-body">
          <h4>Lessons Preview</h4>
          <br>
            @foreach($classSubject->maintopics() as $topic)
              @include('topics/plug_show',['topic'=>$topic])
            @endforeach

        </div>

    </div>

    <p id="display"></p>

</div>

@endsection

@push('styles')

  <link href = "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel = "stylesheet">

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
                url: 'topics/updatesequence',
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
