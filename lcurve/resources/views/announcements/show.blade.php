@extends('layouts.app')

@section('dash-left')

<div class="panel-group">
    
    <div class="panel-primary">
     <div class="panel-body">
        <div class= "panel panel-info" style=" border-color:#abad85;
                    border-width: 2px;  ">                    
          <div class="panel-heading" style="background-color:#d9dbaa;
                    border-width: 2px;  ">
                <div class="col-lg-11">
                  <a href="{{ route('announcements.show', $announcement->id ) }}" style="color: #606060"><b>{{ $announcement->title }}</b></a>
                </div>
                <svg height="20" width="20">
                  <circle cx="10" cy="10" r="8" stroke-width="1" fill="@if(!empty($announcement->announceable->color )) {{$announcement->announceable->color}} @else #abad85 @endif " ></circle>
                                Sorry, your browser does not support inline SVG.  
                </svg>
                <br>
          </div>
          <div class="panel-body" >
              {{$announcement->content}}

              <div class="row">
                <div class="col-lg-8" ></div>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                @can('Edit Announcement')
                <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-info" role="button">Edit</a>
                @endcan
                @can('Delete Announcement')
                    <button type="button" class="btn btn-info btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                @endcan

                 <!-- Modal - start -->
                              <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                 {!! Form::open(['method' => 'DELETE', 'route' => ['announcements.destroy', $announcement->id] ]) !!}
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

              </div>
                           
            </div>                 
          </div>
        </div>

      </div>
</div>
@endsection
