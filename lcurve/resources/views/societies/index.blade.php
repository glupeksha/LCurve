@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Societies</h3>
            </div>
            
            @foreach ($societies as $society)
                <div class="panel-body">
                    <li style="list-style-type:disc">
                    <button><a href="{{ route('societies.show', $society->id ) }}"><b>{{ $society->title }}</b><br>
                            
                        </a></button>

                      
                    </li>
                </div>
            @endforeach
        </div>
            
        <div class="text-center">
            {!! $societies->links() !!}
        </div>
    </div>
</div>


@endsection