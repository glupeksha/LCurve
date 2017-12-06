<?php

use Illuminate\Database\Seeder;
use App\Grade;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
        		'name'=>'Grade 1'
        	]);

        Grade::create([
        		'name'=>'Grade 2'
        	]);

        Grade::create([
        		'name'=>'Grade 3'
        	]);

        Grade::create([
        		'name'=>'Grade 4'
        	]);

        Grade::create([
        		'name'=>'Grade 5'
        	]);

        Grade::create([
        		'name'=>'Grade 6'
        	]);

        Grade::create([
        		'name'=>'Grade 7'
        	]);

        Grade::create([
        		'name'=>'Grade 8'
        	]);

        Grade::create([
        		'name'=>'Grade 9'
        	]);

        Grade::create([
        		'name'=>'Grade 10'
        	]);

        Grade::create([
        		'name'=>'Grade 11'
        	]);

        Grade::create([
        		'name'=>'Grade 12'
        	]);

        Grade::create([
        		'name'=>'Grade 13'
        	]);
    }
}
