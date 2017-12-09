<?php

namespace App\Http\Controllers;

use App\StudentSubjects;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StudentSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(request $request)
    {
        $student=User::find($request);
        $subjects=DB::table('class_subject_user')->where('user_id', $request)->pluck('class_subject_id');
        dd($subjects);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentSubjects  $studentSubjects
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('studentsSubject.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentSubjects  $studentSubjects
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentSubjects $studentSubjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentSubjects  $studentSubjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSubjects $studentSubjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentSubjects  $studentSubjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentSubjects $studentSubjects)
    {
        //
    }
}
