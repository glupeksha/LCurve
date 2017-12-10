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
        


        $taskType=[

            'Quiz' => 'Quiz', 
            'Upload' => 'Upload', 
            'Essay' => 'Essay',
        ];

        return view('tasks.create', compact('taskType'));
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
            'taskType' => 'required',
            ]);

        $title = $request['title'];
        $due_date = $request['due_date'];
        $content = $request['content'];
        $taskType = $request['taskType'];
         if(array_key_exists('isAssignment',$request)){
                dd($request->isAssignment);
                $isAssignment=true;
            }else{
                $isAssignment=false;
            }

        $task = Task::create([
            'title'=>$title,
            'due_date'=>$due_date,
            'content'=>$content,
            'isAssignment'=>$isAssignment,
            'taskType' => $taskType,
        ]);

        $quiz_id=$task->id;

        $relations = [
            'questions' => \App\QuizzTopic::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        if($taskType=='Quiz'){
            return view('quizzes.create',compact('quiz_id'),$relations);
        }

    //Display a successful message upon save
        else{
             return redirect()->route('tasks.index')
            ->with('flash_message', 'Task created');

        } 
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
        $taskType=[

            'Quiz' => 'Quiz', 
            'Upload' => 'Upload', 
            'Essay' => 'Essay',
        ];
        return view ('tasks.edit', compact('task','taskType'));
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

            if($request->has('isAssignment')){
                dd($request->isAssignment);
                $task->isAssignment=true;
            }else{
                $task->isAssignment=false;
            }

             $this->validate($request, [
                'title' => 'required|max:100',
                'due_date'=>'required',
                'content'=>'required|max:100',
                'taskType' => 'required',
            
            ]);


        $task->title = $request->input('title');
        $task->due_date = $request->input('due_date');
        $task->content = $request->input('content');
        $task->taskType = $request->input('taskType');
        $task->save();

         $relations = [
            'questions' => \App\QuizzTopic::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        if($taskType=='Quiz'){
            return view('quizzes.index',compact('quiz_id'),$relations);
        }

        else{
            return redirect()->route('tasks.show', 
            $task->id)->with('flash_message', 
            'Task updated');
        }
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
