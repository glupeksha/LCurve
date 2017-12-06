<?php

use Illuminate\Database\Seeder;
use App\ClassSubject;

class ClassSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassSubject::create([
        		'class_room_id'=>1,
        		'subject_id'=>3,
        		'teacher_id'=>2,
        	]);

        ClassSubject::create([
        		'class_room_id'=>2,
        		'subject_id'=>3,
        		'teacher_id'=>2,
        	]);

        ClassSubject::create([
        		'class_room_id'=>2,
        		'subject_id'=>1,
        		'teacher_id'=>2,
        	]);

        ClassSubject::create([
        		'class_room_id'=>5,
        		'subject_id'=>1,
        		'teacher_id'=>2,
        	]);
    }
}
