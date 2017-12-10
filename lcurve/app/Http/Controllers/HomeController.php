<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->hasRole('Admin')){
        return view('home_admin');
      }else if(Auth::user()->hasRole('Teacher')){
        return view('home_teacher');
      }else if(Auth::user()->hasRole('Student')){
        return view('home_student');
      }else if(Auth::user()->hasRole('Student')){
        return view('home_teacher');
      }
      return view('home');
    }
}
