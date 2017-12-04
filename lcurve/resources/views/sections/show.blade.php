@extends('layouts.app')

@section('dash-left')


    <h3>{{ $section->grade }}</h3>
    <hr style="border-color:#848991">
    
    <hr style="border-color:#848991">
    {!! Form::open(['method' => 'DELETE', 'route' => ['sections.destroy', $section->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Section')
    <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Section')
    <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
    @endcan

    <!-- Modal - start -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                     {!! Form::open(['method' => 'DELETE', 'route' => ['sections.destroy', $section->id] ]) !!}
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

    {!! Form::close() !!}


@endsection