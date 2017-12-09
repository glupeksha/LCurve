<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'seqNo' => '1', 
            'class_subject_id'=>'1',
            'parent'=>'1',
            'name'=> 'Human Biology',
            'content'=>'Human Biology. This major is designed to provide students with the fundamental courses required for entry into: schools of medicine, veterinary medicine, dentistry, and pharmacy; Ph.D. programs in the biomedical sciences; and biotech research, teaching, medical technology, patent law, physical therapy, nutrition, and ...',
        ]);

        Topic::create([
            'seqNo' => '2', 
            'class_subject_id'=>'2',
            'parent'=>'2',
            'name'=> 'Mechanics ',
            'content'=>'1   Course Outline, Review of Forces and Moments, Introduction to Equilibrium    
2   Forces, Moments, Equilibrium     
3   Applying the Equations of Equilibrium, Planar Trusses    
4   Friction',
        ]);

        Topic::create([
            'seqNo' => '3', 
            'class_subject_id'=>'3',
            'parent'=>'3',
            'name'=> 'organic',
            'content'=>'Organic chemistry is a chemistry subdiscipline involving the scientific study of the structure, properties, and reactions of organic compounds and organic materials, i.e., matter in its various forms that contain carbon atoms.',
        ]);

        Topic::create([
            'seqNo' => '4', 
            'class_subject_id'=>'4',
            'parent'=>'4',
            'name'=> 'Human Biology',
            'content'=>'Human Biology. This major is designed to provide students with the fundamental courses required for entry into: schools of medicine, veterinary medicine, dentistry, and pharmacy; Ph.D. programs in the biomedical sciences; and biotech research, teaching, medical technology, patent law, physical therapy, nutrition, and ...',
        ]);

        Topic::create([
            'seqNo' => '5', 
            'class_subject_id'=>'5',
            'parent'=>'5',
            'name'=> 'Mechanics ',
            'content'=>'1   Course Outline, Review of Forces and Moments, Introduction to Equilibrium    
2   Forces, Moments, Equilibrium     
3   Applying the Equations of Equilibrium, Planar Trusses    
4   Friction',
        ]);
    }
}
