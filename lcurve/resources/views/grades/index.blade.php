@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Grades</h3>
            </div>
            <div class="panel-heading" style="background-color: #d9dbaa; border-color: #d9dbaa !important">Page {{ $grades->currentPage() }} of {{ $grades->lastPage() }}
            </div>
            @foreach ($grades as $grade)
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

 @can('Create Grade')
 <div class="col-lg-10"></div>  
    <a href="{{ route('grades.create') }}" class="btn btn-info" role="button" style="background-color: #0b9b7e;border-color: #0b9b7e;">Add</a>
    @endcan


@endsection
