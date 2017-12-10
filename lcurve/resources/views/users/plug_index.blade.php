<div class="table-responsive">
    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date/Time Added</th>
                <th>User Roles</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                <td>
                <!--starts add user permissions-->
                @if(Auth::User()->can('Edit User'))
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success pull-left" style="margin-right: 3px;">Edit</a>
                @endif

                <!--starts add user permissions-->
                @if(Auth::User()->can('Delete User'))
                {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['users.destroy', $user->id] ]) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-success']) !!}
                @endif
                
                {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
