<?php

use Illuminate\Database\Seeder;
use App\ClassRoom;
class ClassRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassRoom::create([
        	'grade_id'=>1,
        	'name'=>'D'
        	]);

        ClassRoom::create([
        	'grade_id'=>2,
        	'name'=>'E'
        	]);

        ClassRoom::create([
        	'grade_id'=>2,
        	'name'=>'F'
        	]);

        ClassRoom::create([
        	'grade_id'=>2,
        	'name'=>'G'
        	]);

         ClassRoom::create([
        	'grade_id'=>3,
        	'name'=>'G'
        	]);



    }
}
