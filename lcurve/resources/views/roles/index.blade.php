@extends('layouts.app')
@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">
    <h3>
        <i class="fa fa-key"></i> Roles Management  </h3>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <!--roles table topics-->
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <!--roles table contents start-->
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        {{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}
                    </td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                        <!--starts set permissions-->
                        @if(Auth::User()->can('Edit Role'))
                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        @endif

                        <!--starts set permissions-->
                        @if(Auth::User()->can('Delete Role'))
                        {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['roles.destroy', $role->id] ]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-primary']) !!}
                        @endif

                        {!! Form::close() !!}
                    </td>
                </tr>
                <!--roles table contents end-->
                @endforeach
            </tbody>

        </table>
    </div>
    <!--starts set permissions-->
    @if(Auth::User()->can('Create Role'))
    <div class="col-lg-10"></div>
    <a href="{{ URL::to('roles/create') }}" class="btn btn-primary">Add Role</a>
    @endif
</div>

@endsection
