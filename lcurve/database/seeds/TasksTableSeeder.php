<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
        	'title'=>'English Essay',
        	'due_date'=>'2018-01-03',
        	'content'=>'Environment pollution',
        	'isAssignment'=>'1',
          'taskType' => 'Quiz',

      ]);
        Task::create([
            'title'=>'Solve Geometry questions',
            'due_date'=>'2018-02-03',
            'content'=>'Solve Geometry questions in page 24, 25 and page 30',
            'isAssignment'=>'1',
            'taskType' => 'Quiz',
      ]);
        Task::create([
            'title'=>'Complete Quiz',
            'due_date'=>'2018-03-03',
            'content'=>'Blood Circular System',
            'isAssignment'=>'1',
            'taskType' => 'Upload',      

      ]);
    Task::create([
            'title'=>'Give answers to forum questions',
            'due_date'=>'2018-04-03',
            'content'=>'Python',
            'isAssignment'=>'1', 
            'taskType' => 'Essay',     

      ]);
    }
}
