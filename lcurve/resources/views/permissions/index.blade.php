@extends('layouts.app')

@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">
    <h3><i class="fa fa-key"></i>Available Permissions

    <a href="{{ route('users.index') }}" class="btn btn-success pull-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-success pull-right">Roles</a></h3>
    <br>   
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <!--edit delete buttons-->
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-success pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-9"></div>
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

</div>

@endsection