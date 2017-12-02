@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Questions</h3>
            </div>
            <div class="panel-heading">Page {{ $forums->currentPage() }} of {{ $forums->lastPage() }}
            </div>
            @foreach ($forums as $forum)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                        <a href="{{ route('forums.show', $forum->id ) }}"><b>{{ $forum->title }}</b><br>
                            <p class="teaser">
                               {{  str_limit($forum->content, 100) }} {{-- Limit teaser to 100 characters --}}
                            </p>
                        </a>
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $forums->links() !!}
        </div>
    </div>
</div>


@endsection