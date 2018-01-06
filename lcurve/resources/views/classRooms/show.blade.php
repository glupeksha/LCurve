@extends('layouts.app')

@section('dash-left')
    <br><br>
    <div class="panel panel-default">
        <div class="panel-body panel-heading">
            <br>
            <lable><b>@lang('applang.gradeClass')</b></lable>
            {{ $classRoom->grade->name }}
            <br>
           <lable><b>@lang('applang.nameOfTheClass')</b></lable>
            {{$classRoom->name}}
            
             <hr style="border-color:#848991">
              <hr style="border-color:#848991">

            <div class="row">

                <div class="col-lg-8"> 
               {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['classRooms.destroy', $classRoom->id] ]) !!} 
                <a href="{{ url()->previous() }}" class="btn btn-success">@lang('applang.back')</a>

                <!--starts Add society permissions-->
                @if(Auth::User()->can('Edit ClassRoom') || Auth::User()->can('Edit ClassRoom '.$classRoom->id))
                <a href="{{ route('classRooms.edit', $classRoom->id) }}" class="btn btn-success" role="button">@lang('applang.edit')</a>
                @endif
               
                @if(Auth::User()->can('Delete ClassRoom') || Auth::User()->can('Delete ClassRoom '.$classRoom->id))                      
                  {!! Form::submit(Lang::get('applang.delete'),['class'=>'btn btn-success']) !!}

                @endif
                {!! Form::close() !!}
                </div> 
            </div>
            <br>
        </div>


    </div>


@endsection
