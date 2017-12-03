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
                    <div class="panel panel-info">
                    <li>
                        <div class="panel-heading">
                            <a href="{{ route('forums.show', $forum->id ) }}"><b>{{ $forum->title }}</b><br>
                        </div>
                        <div class="panel-body">
                            <p class="teaser">
                               {{  str_limit($forum->content, 100) }} {{-- Limit teaser to 100 characters --}}</a>
                            </p>
                        </div>
                    </li>
                </div>
             </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $forums->links() !!}
        </div>
    </div>
</div>


@endsection