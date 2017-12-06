@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1" >
        <div class="panel panel-default" > 
            <div class="panel-heading"  >
                <h3>Events</h3>
            </div>
            <div class="panel-heading">Page {{ $events->currentPage() }} of {{ $events->lastPage() }}
            </div>

            @foreach ($events as $event)         
                <div class="panel-body" style="color: #606060">
                    <div class="panel panel-info" style="border-color:#bbbe64 ;border-width: 2px;  ">                    
                        <div class="panel-heading" style="background-color: #d9dbaa !important;">
                            <a href="{{ route('events.show', $event->id ) }}"><b>{{ $event->title }}</b></a>
                        <br>
                        </div>                
                    </div>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $events->links() !!}
        </div>
    </div>
</div>


@endsection
