@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Sports</h3>
            </div>


            <div class="panel-body">
            @foreach ($sports as $sport)
                <div class="row">
                    <div class="col-lg-8">
                        {{--<button class="buttonstyles">--}}
                        <a href="{{ route('sports.show', $sport->id ) }}"><b>{{ $sport->name }}</b></a>
                        {{--</button>--}}
                    </div>

                    <div class="col-lg-4">

                    @can('Edit Sport')
                    <a href="{{ route('sports.edit', $sport->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan

                    @can('Delete Sport')
                    <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                    @endcan
                    
                    </div>
                </div>

                  <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['sports.destroy', $sport->id] ]) !!}
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Are you sure you want to delete?</h4>
                        </div>

                        <div class="modal-footer">          
                            {!! Form::submit('OK') !!}
                        </div>
                      </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                <!-- Modal - end -->

            @endforeach
            </div>

        </div>

        <div class="text-center">
            {!! $sports->links() !!}
        </div>
    </div>
</div>

@endsection
