@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Essays</h3>
            </div>


            <div class="panel-body">
            @foreach ($essays as $essay)
                <div class="panel-body panel-heading">
                <div class="row">
                <!--society name load start-->
                    <div class="col-lg-8">
                    <div class="col-lg-2"></div>
                        {{--<button class="buttonstyles">--}}
                              <a href="{{ route('essays.show', $essay->id ) }}"><b>{{ $essay->question }}</b></a>
                        {{--</button>--}}

                    </div>
                    <!--edit delete buttons start-->
                    <div class="col-lg-4">
                            {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['essays.destroy', $essay->id] ]) !!}                 
                                @can('Edit Essay')
                                <a href="{{ route('essays.edit', $essay->id) }}" class="btn btn-success" role="button">Edit</a>
                                @endcan
                                
                                @can('Delete Essay')                               
                                  {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                                @endcan
                            {!! Form::close() !!}
                    
                    </div>
                <!--edit delete buttons end-->
                <!--society name load end-->
                     <div class="col-lg-4">
                      {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['essays.destroy', $essay->id] ]) !!}


                <!--edit and delete button start-->
                        @can('Edit Subject '.$essay->id)
                        <a href="{{ route('essays.edit', $essay->id) }}" class="btn btn-info" role="button">Edit</a>
                        @endcan
                        @can('Delete Essay '.$essay->id)

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
            {!! $essays->links() !!}
        </div>
    </div>
</div>
</div>
@endsection
