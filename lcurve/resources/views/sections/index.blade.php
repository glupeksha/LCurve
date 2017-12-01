@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Sections</h3>
            </div>
            <div class="panel-heading">Page {{ $sections->currentPage() }} of {{ $sections->lastPage() }}
            </div>
            @foreach ($sections as $section)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('sections.show', $section->id ) }}"><b>{{ $section->grade }}</b>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $sections->links() !!}
        </div>
    </div>
</div>


@endsection