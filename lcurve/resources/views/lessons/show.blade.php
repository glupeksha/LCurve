@extends('layouts.app')

@section('dash-left')
<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">

    <h3>{{$lesson->title}}</h3>
    <h6>{{ $lesson->updated_at }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $lesson-> created_at}}</h6>


    <hr style="border-color:#848991">
    <div>
        {!! $lesson->content !!}
    </div>

<div class="col-lg-8"></div>    
  {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['lessons.destroy', $lesson->id] ]) !!} 

    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

    @can('Edit Lesson')
    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
                
    @can('Delete Lesson')
      {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
     @endcan
  {!! Form::close() !!}

   

</div>
</div>
</div>

@endsection