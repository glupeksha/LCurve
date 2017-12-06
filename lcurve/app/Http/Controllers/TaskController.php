<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //index method for task
        $tasks = Task::orderby('id','desc')->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'title'=>'required|max:100',
            'due_date'=>'required',
            'content' =>'required|max:100',
            'isAssignment' =>'required',
            ]);

        $title = $request['title'];
        $due_date = $request['due_date'];
        $content = $request['content'];
        $isAssignment = $request['isAssignment'];

        $task = Task::create($request->only('title','due_date', 'content','isAssignment'));

    //Display a successful message upon save
        return redirect()->route('tasks.index')
            ->with('flash_message', 'Task created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view ('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view ('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
             $this->validate($request, [
                'title' => 'required|max:100',
                'due_date'=>'required',
                'content'=>'required|max:100',
                'isAssignment'=>'required',
            
            ]);


        $task->title = $request->input('title');
        $task->due_date = $request->input('due_date');
        $task->content = $request->input('content');
        $task->isAssignment = $request->input('isAssignment');
        $task->save();

        return redirect()->route('tasks.show', 
            $task->id)->with('flash_message', 
            'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('flash_message',
             'Task successfully deleted');
    }
}
