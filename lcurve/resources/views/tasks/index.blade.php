@extends('layouts.app')
@section('dash-left')



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
                                        <p >{{ $task->content }} </p>
                                      </div>
                                   
                                 </div>
                               </div>
                            


                            @endforeach
                          </div>
                        </div>
                      </div>
            
           
    
              
            </div>
        </div>


            @can('Create Task')
            <div class="col-lg-8">
                <a href="{{route('tasks.create')}}" class="btn btn-info" role="button" style="background-color: #0b9b7e;border-color: #0b9b7e;">Create New Task</a>
            </div>
            @endcan


            
        

        <div class="text-center">
            {!! $tasks->links() !!}
        </div>
        

@endsection


                               