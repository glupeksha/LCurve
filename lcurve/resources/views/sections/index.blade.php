@extends('layouts.app')
@section('dash-left')

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Sections</h3>
            </div>

            @foreach ($sections as $section)
                <div class="panel-body">                    
                    <a href="{{ route('sections.show', $section->id ) }}"><b>{{ $section->grade }}</b>
                    </a>
                    
                </div>
            @endforeach
        </div>
            
        
    </div>
</div>


@endsection