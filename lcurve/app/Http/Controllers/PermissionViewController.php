<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\User;

class PermissionViewController extends Controller
{
  //return index page according to roles of the user
    public function permissionIndexView($permissibleType)
    {
      $permissions= Permission::all()->where('permissible_type','App\\'.$permissibleType);
      return view('permissions.index',compact('permissions'));
    }

    public function addUser(Request $request, Permission $permission)
    {
      $user=User::findOrFail($request->input('user_id'));
      $user->givePermissionTo($permission);

        return redirect()->route('permissions.index')
            ->with('flash_message',
             'Permission'. $permission->name.' updated!');
    }
}
