<!--Home work Pane start-->
<div class="row defaultMargin">
<!-- Homework Body -->
<div id="homework" class="row notify notify_cr">
    <!-- Header -->
          <div class="row notify_head notify_head_cr">
              <div class="col-lg-9">
              </div>
              <div class="col-lg-3 notify_indi notify_indi_cr">
                Homework
              </div>
          </div>
        <!-- Notification brief -->
          <div class="row notify_shead notify_shead_cr">
            <div class="col-lg-12">
              <div class="col-lg-9">
                Number of tasks remaining
              </div>
              <div id="task_remaining" class="col-lg-3"></div>
            </div>
          </div>
          <!-- Details -->
          <div class="row notify_body notify_body_cr">
            <div class="col-lg-12">
              <div id="panels_cr" class="col-lg-12 panel-group">
                 @foreach ($tasks as $task)


                   <div class="col-lg-6 MarginPanels panel-group">
                     <div class="panel panel-success">
                       <div class="panel-heading"> {{--<button class="buttonstyles">--}}
                            <a href="{{ route('tasks.show', $task->id ) }}"><b>{{ $task->title }}</b></a>
                            {{--</button>--}}
                        </div>
                          <div class="panel-body panelBodyColor">
                              {{ $task->content }}
                          </div>

                     </div>
                   </div>

                @endforeach
              </div>
            </div>
          </div>


</div>
</div>

<div class="col-lg-9"></div>
<!--starts sports create permissions-->
@if(Auth::User()->can('Create Task'))
<div class="col-lg-3">
    <a href="{{route('tasks.create')}}" class="btn btn-success" role="button" >Create New Task</a>
</div>
@endif
