@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Subjects</h3>
            </div>


            <div class="panel-body">
            @foreach ($subjects as $subject)
                <div class="panel-body panel-heading">
                <div class="row">
                <!--society name load start-->
                    <div class="col-lg-8">
                    <div class="col-lg-2"></div>
                        {{--<button class="buttonstyles">--}}
                              <a href="{{ route('subjects.show', $subject->id ) }}"><b>{{ $subject->name }}</b></a>
                        {{--</button>--}}

                    </div>
                    <!--edit delete buttons start-->
                    <div class="col-lg-4">
                            {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['subjects.destroy', $subject->id] ]) !!}                 
                                @can('Edit Sport')
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-success" role="button">Edit</a>
                                @endcan
                                
                                @can('Delete Sport')                               
                                  {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                                @endcan
                            {!! Form::close() !!}
                    
                    </div>
                    <!--edit delete buttons end-->
                <!--society name load end-->
                     <div class="col-lg-4">
                      {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['subjects.destroy', $subject->id] ]) !!}


                <!--edit and delete button start-->
                        @can('Edit Subject '.$subject->id)
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info" role="button">Edit</a>
                        @endcan
                        @can('Delete Subject '.$subject->id)

                          {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}

                        @endcan
                        {!! Form::close() !!}
                <!--edit and delete button end-->
                    </div>
                </div>

                <br>
                 </div>
            @endforeach

        </div>

        <div class="text-center">
            {!! $subjects->links() !!}
        </div>
    </div>
</div>
</div>
@endsection
