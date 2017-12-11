@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Grades</h3>
            </div>           
            
            @foreach ($grades as $grade)
                <div class="col-lg-1 "></div>
                    <a href="{{ route('grades.show', $grade->id ) }}" class="list-group-item" >
                        <div class="col-lg-offset-1">
                        <b>                         
                        {{ $grade->name }}                      
                        </b>
                        </div>
                    </a>
            @endforeach

        <div class="text-center">
            {!! $grades->links() !!}
        </div>
    </div>
</div>
</div>
<div class="col-lg-10"></div> 
@if(Auth::User()->can('Create Grade') || Auth::User()->can('Create Grade'.$grade->id)) 
    <a href="{{ route('grades.create') }}" class="btn btn-success" role="button" class="create-styles" >
        Add
    </a>
@endif

@endsection


