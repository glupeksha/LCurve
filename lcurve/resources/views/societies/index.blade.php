@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h3>Societies</h3>
            </div>

            <div class="panel-body">
            @foreach ($societies as $society)
                
                    <button class="buttonx" >
                    <a href="{{ route('societies.show', $society->id ) }}"><b>{{ $society->title }}</b></a>
                    </button>
                
            @endforeach
            </div>
      
        </div>
            
        <div class="text-center">
            {!! $societies->links() !!}
        </div>
    </div>
</div>


@endsection