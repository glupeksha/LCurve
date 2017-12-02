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
                <div class="row">
                    <div class="col-lg-8">
                        {{--<button class="buttonstyles">--}}
                        <a href="{{ route('societies.show', $society->id ) }}"><b>{{ $society->name }}</b></a>
                        {{--</button>--}}
                    </div>

                    <div class="col-lg-4">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['societies.destroy', $society->id] ]) !!}

                    @can('Edit Society')
                    <a href="{{ route('societies.edit', $society->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan

                    @can('Delete Society')
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    @endcan
                    {!! Form::close() !!}
                    </div>
                </div>

            @endforeach
            </div>

        </div>

        <div class="text-center">
            {!! $societies->links() !!}
        </div>
    </div>
</div>


@endsection
