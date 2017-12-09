@extends('layouts.app')
@section('dash-left')

<div class="col-lg-10 col-lg-offset-1">
    <h3>
        <i class="fa fa-key"></i> Roles
        <a href="{{ route('users.index') }}" class="btn btn-primary pull-right">Users</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-primary pull-right">Permissions</a>
    </h3>
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
                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-primary pull-left" style="margin-right: 3px;">Edit</a>                       
                        {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['roles.destroy', $role->id] ]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
                <!--roles table contents end--> 
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="col-lg-10"></div>
    <a href="{{ URL::to('roles/create') }}" class="btn btn-primary">Add Role</a>

</div>

@endsection
