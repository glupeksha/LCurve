@extends('layouts.admin.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Grades</h3>
            </div>
            <div class="panel-heading heading-style" >
                Page {{ $grades->currentPage() }} of {{ $grades->lastPage() }}
            </div>
            @foreach ($grades as $grade)
            <!--grade names view-->
                <div class="panel-body">
                    <a href="{{ route('grades.show', $grade->id ) }}"><b>{{ $grade->name }}</b>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {!! $grades->links() !!}
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
