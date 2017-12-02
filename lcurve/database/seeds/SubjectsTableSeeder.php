<?php

use Illuminate\Database\Seeder;
use App\Subject;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
          'name'=>'Sinhala',
          'image'=>Image::make('public/images/subject_icons/sinhala.png')->encode('data-url'),
          'color'=>'red'
        ]);
        Subject::create([
          'name'=>'Mathematics',
          'image'=>Image::make('public/images/subject_icons/mathematics.png')->encode('data-url'),
          'color'=>'blue'
        ]);
        Subject::create([
          'name'=>'History',
          'image'=>Image::make('public/images/subject_icons/history.png')->encode('data-url'),
          'color'=>'yellow'
        ]);
        Subject::create([
          'name'=>'Science',
          'image'=>Image::make('public/images/subject_icons/science.png')->encode('data-url'),
          'color'=>'red'
        ]);
        Subject::create([
          'name'=>'Geography',
          'image'=>Image::make('public/images/subject_icons/geography.png')->encode('data-url'),
          'color'=>'green'
        ]);
        Subject::create([
          'name'=>'English',
          'image'=>Image::make('public/images/subject_icons/english.png')->encode('data-url'),
          'color'=>'pink'
        ]);
    }
}
