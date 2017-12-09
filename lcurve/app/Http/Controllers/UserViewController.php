<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class UserViewController extends Controller
{
  //return index page according to roles of the user
    public function userIndexView($rolename)
    {
      
      $users= Role::with('users')->where('name',$rolename)->first()->users;
      return view('users.index')->with('users', $users);
    }
}
