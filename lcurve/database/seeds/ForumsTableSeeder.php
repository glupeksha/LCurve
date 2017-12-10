<?php

use Illuminate\Database\Seeder;
use App\Forum;

class ForumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forum::create([
        	'user_id'=>'1',
        	'title'=>'Biology', 
        	'content'=>'
Life and its functions, including Anatomy & Physiology, Botany, Zoology, Ecology/Bionomics, Evolution and Extinction.',
        ]);

        Forum::create([
        	'user_id'=>'2',
        	'title'=>'Mathematics', 
        	'content'=>'
The study of the measurement, properties, and relationships of quantities and sets, using numbers and symbols.',
        ]);

        Forum::create([
        	'user_id'=>'3',
        	'title'=>'Electrical and Electronics', 
        	'content'=>'
From breadboards to the latest high tech gadgets that drive our society. This forum is to discuss the development, design and construction of all things electronic. Consult with others on how electronics work to what type of cell phone to purchase. From capacitors, resistors, inductors to microwave transmitters.',
        ]);

        Forum::create([
        	'user_id'=>'4',
        	'title'=>'Computer Science', 
        	'content'=>'
The software, hardware, peripherals and devices working with or pertaining to computers and computer related devices. Programming, microprocessors, micro controllers, modems, printers, mice, crts and devices related to computers, software and accessories.',
        ]);


        
    }
}
