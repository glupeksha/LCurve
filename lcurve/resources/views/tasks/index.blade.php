@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Tasks</h3>
            </div>


            <div class="panel-heading">Page {{ $tasks->currentPage() }} of {{ $tasks->lastPage() }}
            </div>

            <div class="panel-body">
            @foreach ($tasks as $task)
                <div class="row">
                    <div class="col-lg-8">
                        {{--<button class="buttonstyles">--}}
                         <div class="col-lg-2"></div>
                        <a href="{{ route('tasks.show', $task->id ) }}"><b>{{ $task->title }}</b></a>
                        {{--</button>--}}
                    </div>

                    <div class="col-lg-4">

                    @can('Edit Task')
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan

                    @can('Delete Task')
                    <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                    @endcan
                    
                    </div>
                </div>
                <br>

                  <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id] ]) !!}
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
            @endforeach
            </div>

        </div>

        <div class="text-center">
            {!! $tasks->links() !!}
        </div>
    </div>
</div>

@endsection
