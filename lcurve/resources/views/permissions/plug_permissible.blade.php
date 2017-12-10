<div class="table-responsive">
    <table class="table table-bordered table-striped">
    <!--roles table topics-->
        <thead>
            <tr>
                <th>{{ substr($permissions->first()->permissible_type,4) }}</th>
                <th>Permission</th>
                <th>Authorized Users</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <!--roles table contents start-->
            <tr>
                <td>@if ($permission->permissible_type)
                  {{$permission->permissible_type::find($permission->permissible_id)->name}}
                @else
                  General
                @endif</td>
                <td>{{ $permission->name }}</td>
                <td>
                    {{ str_replace(array('[',']','"'),'', $permission->users()->pluck('name')) }}
                </td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                <td>
                     @if(Auth::User()->can('Edit Permission'))
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    @endif

                    @if(Auth::User()->can('Delete Permission'))
                    {!! Form::open(['method' => 'DELETE','onsubmit' => 'return confirm("Are you sure?")','route' => ['permissions.destroy', $permission->id] ]) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    @endif
                    {!! Form::close() !!}
                </td>
            </tr>
            <!--roles table contents end-->
            @endforeach
        </tbody>

    </table>
</div>
