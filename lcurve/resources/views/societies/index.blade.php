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
                <div class="row">
                    <div class="col-lg-8">
                        {{--<button class="buttonstyles">--}}
                        <a href="{{ route('societies.show', $society->id ) }}"><b>{{ $society->name }}</b></a>
                        {{--</button>--}}
                    </div>

                    <div class="col-lg-4">

                    @can('Edit Society')
                    <a href="{{ route('societies.edit', $society->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan

                    @can('Delete Society')
                    <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                    @endcan
                    
                    </div>
                </div>
                <br>

                  <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['societies.destroy', $society->id] ]) !!}
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

            @endforeach
            </div>

        </div>

        <div class="text-center">
            {!! $societies->links() !!}
        </div>
    </div>
</div>

@endsection
