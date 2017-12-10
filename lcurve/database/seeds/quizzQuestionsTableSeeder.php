<?php

use Illuminate\Database\Seeder;
use App\QuizzQuestion;

class quizzQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	QuizzQuestion::create([
    		'question_text'=>'The plant cells that can develop into any type of tissue are called:', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'Plant stem cells are also characterized by their location in specialized structures called meristematic tissues, which are located in root apical meristem (RAM), shoot apical meristem (SAM), and vascular system ((pro)cambium or vascular meristem.)', 
    		'more_info_link'=>'www.biologyreference.com › Co-Dn', 
    		'topic_id'=>'0001'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'The plant cells that can develop into any type of tissue are called:', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'Plant stem cells are also characterized by their location in specialized structures called meristematic tissues, which are located in root apical meristem (RAM), shoot apical meristem (SAM), and vascular system ((pro)cambium or vascular meristem.)', 
    		'more_info_link'=>'www.biologyreference.com › Co-Dn', 
    		'topic_id'=>'0002'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'Chromosomes move toward opposite ends of the cell during:', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'ANAPHASE: The paired chromosomes separate. They move along the microtubules toward opposite poles of the cell. The poles move farther apart. By the end of anaphase, the two poles of the cell each have a complete set of chromosomes.', 
    		'more_info_link'=>'https://quizlet.com/82008670/bio-ch-10-flash-cards/', 
    		'topic_id'=>'0003'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'Plant cells are different from animal cells because they have:', 
    		'code_snippet'=>'........', 
    		'answer_explanation'=>'Plant Cells. Structurally, plant and animal cells are very similar because they are both eukaryotic cells. They both contain membrane-bound organelles such as the nucleus, mitochondria, endoplasmic reticulum, golgi apparatus, lysosomes, and peroxisomes.', 
    		'more_info_link'=>'https://www.thoughtco.com/cell ', 
    		'topic_id'=>'0004'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'Epithelial, connective, vascular, and nervous tissues are the four types of animal tissues
', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'Epithelial. Epithelial tissue is made of closely-packed cells arranged in flat sheets. ...
			Muscle. Three kinds of muscle are found in vertebrates: ...
			Connective. The cells of connective tissue are embedded in a great amount of extracellular material. ...
			Nerve. Nerve tissue is composed of. ...
			Blood.', 
    		'more_info_link'=>'www.biology-pages.info/A/AnimalTissues.html', 
    		'topic_id'=>'0005'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'The plant cells that can develop into any type of tissue are called:', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'Plant stem cells are also characterized by their location in specialized structures called meristematic tissues, which are located in root apical meristem (RAM), shoot apical meristem (SAM), and vascular system ((pro)cambium or vascular meristem.)', 
    		'more_info_link'=>'www.biologyreference.com › Co-Dn', 
    		'topic_id'=>'0001'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'The plant cells that can develop into any type of tissue are called:', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'Plant stem cells are also characterized by their location in specialized structures called meristematic tissues, which are located in root apical meristem (RAM), shoot apical meristem (SAM), and vascular system ((pro)cambium or vascular meristem.)', 
    		'more_info_link'=>'www.biologyreference.com › Co-Dn', 
    		'topic_id'=>'0002'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'Chromosomes move toward opposite ends of the cell during:', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'ANAPHASE: The paired chromosomes separate. They move along the microtubules toward opposite poles of the cell. The poles move farther apart. By the end of anaphase, the two poles of the cell each have a complete set of chromosomes.', 
    		'more_info_link'=>'https://quizlet.com/82008670/bio-ch-10-flash-cards/', 
    		'topic_id'=>'0003'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'Plant cells are different from animal cells because they have:', 
    		'code_snippet'=>'........', 
    		'answer_explanation'=>'Plant Cells. Structurally, plant and animal cells are very similar because they are both eukaryotic cells. They both contain membrane-bound organelles such as the nucleus, mitochondria, endoplasmic reticulum, golgi apparatus, lysosomes, and peroxisomes.', 
    		'more_info_link'=>'https://www.thoughtco.com/cell ', 
    		'topic_id'=>'0004'


    	]);

    	QuizzQuestion::create([
    		'question_text'=>'Epithelial, connective, vascular, and nervous tissues are the four types of animal tissues
', 
    		'code_snippet'=>'.......', 
    		'answer_explanation'=>'Epithelial. Epithelial tissue is made of closely-packed cells arranged in flat sheets. ...
			Muscle. Three kinds of muscle are found in vertebrates: ...
			Connective. The cells of connective tissue are embedded in a great amount of extracellular material. ...
			Nerve. Nerve tissue is composed of. ...
			Blood.', 
    		'more_info_link'=>'www.biology-pages.info/A/AnimalTissues.html', 
    		'topic_id'=>'0005'


    	]);




    }
}
