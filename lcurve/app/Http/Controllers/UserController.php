<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use App\ClassSubject;
use App\ClassRoom;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $searchableList = ClassRoom::all();
        return view('users.create', compact('roles','searchableList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password')); //Retrieving only the email and password data

        $user_id = $user->id;

        $roles = $request['roles']; //Retrieving the roles field


        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to usery
            }
        }

        //If Role is Student redirect to subject selection
        if($user->hasRole('Student')){
          return $this->storeUserClassRoom($request,$user);
        }
        //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $searchableList = ClassRoom::all();
        return view('users.edit', compact('user', 'roles','searchableList')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //$user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$user->id,
        ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        //if role is student redirect to subject selection
        if($user->hasRole('Student')){
          return $this->storeUserClassRoom($request,$user);
        }else{
          $user->classroom()->dissociate();
          $user->save();
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //Find a user with a given id and delete
        //$user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully deleted.');
    }


    public function storeUserClassRoom(Request $request, User $user){
        $this->validate($request,[
            'searched_id'=>'required',
        ]);
        $classRoom=ClassRoom::findOrFail($request->input('searched_id'));
        $user->classRoom()->associate($classRoom);
        $user->save();
        $classSubjects=$classRoom->classSubjects()->get();

        return view('studentSubjects.create',compact('user','classSubjects'));
    }

    public function storeUserClassSubjects(Request $request, User $user){
        $student=User::find($request->invisible);
        $classsubjects = $request['classsubjects'];
        foreach ($classsubjects as $classsubject) {
          $user->classSubjects()->attach($classsubject);
        }
        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully added.');
    }
}
