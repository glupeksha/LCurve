@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Societies</h3>
            </div>

            <div class="panel-body">

            @foreach ($societies as $society)
                <div class="panel-body panel-heading">
                    <div class="row">

                    <!--society name load start-->
                        <div class="col-lg-8">
                            {{--<button class="buttonstyles">--}}
                                  <a href="{{ route('societies.show', $society->id ) }}" class="list-group-item"><b>{{ $society->name }}</b></a>
                            {{--</button>--}}
                        </div>
                        <!--society name load end-->
                        <div class="col-lg-4">
                        {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['societies.destroy', $society->id] ]) !!}


                        <!--edit and delete button start-->
                        <!--Starts edit permissions-->
                        @if(Auth::User()->can('Edit Society') || Auth::User()->can('Edit Society '.$society->id))
                        <a href="{{ route('societies.edit', $society->id) }}" class="btn btn-success" role="button">Edit</a>
                        @endif
                        <!--End edit permissions-->

                        <!--starts delete permissions-->
                        @if(Auth::User()->can('Delete Society') || Auth::User()->can('Delete Society'.$society->id))
                        {!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
                        @endif
                        <!--End delete permissions-->


                        {!! Form::close() !!}
                        <!--edit and delete button end-->
                    </div>
                </div>

                <br>
                 </div>
            @endforeach

        </div>

        <div class="text-center">
            {!! $societies->links() !!}
        </div>
    </div>
</div>
</div>


<!--starts Add society permissions-->
@if(Auth::User()->can('Create Society'))
<div class="col-lg-8"></div>
    <a href="{{ route('societies.create') }}" class="btn btn-success " role="button" >Add a new society</a>
@endif
<!--Ends Add society permissions-->

@endsection
