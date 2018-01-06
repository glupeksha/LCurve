@extends('layouts.app')
@section('dash-left')
 
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>@lang('applang.subjectsGiven')</h3>
            </div>


            @foreach ($subjects as $subject)
                <div class="col-lg-1 "></div>
                    <a href="{{ route('subjects.show', $subject->id ) }}" class="list-group-item" >
                        <div class="col-lg-offset-1">
                        <b>                         
                        {{ $subject->name }}                      
                        </b>
                        </div>
                    </a>
                
            @endforeach

        <div class="text-center">
            {!! $subjects->links() !!}
        </div>
    </div>
</div>
</div>
<div class="col-lg-10"></div> 
@if(Auth::User()->can('Create Subject') || Auth::User()->can('Create Subject'.$subject->id)) 
    <a href="{{ route('subjects.create') }}" class="btn btn-success" role="button" class="create-styles" >
        @lang('applang.addNew')
    </a>
@endif

@endsection
