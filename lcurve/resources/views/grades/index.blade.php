@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Grades</h3>
            </div>
            <div class="panel-heading">Page {{ $grades->currentPage() }} of {{ $grades->lastPage() }}
            </div>
            @foreach ($grades as $grade)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('grades.show', $grade->id ) }}"><b>{{ $grade->name }}</b>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $grades->links() !!}
        </div>
    </div>
</div>

 @can('Create Grade')
    <a href="{{ route('grades.create') }}" class="btn btn-info" role="button">Add</a>
    @endcan


@endsection
