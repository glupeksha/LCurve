<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Role
        $role=Role::find(1);

        $role->givePermissionTo(Permission::create(['name'=>'Administrator Permissions']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Role']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Permission']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Permission']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Permission']));
        $role->givePermissionTo(Permission::create(['name'=>'Create User']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit User']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete User']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Role']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Role']));

        //Announcements
        $role->givePermissionTo(Permission::create(['name'=>'Create Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Announcement']));

        //Society
        $role->givePermissionTo(Permission::create(['name'=>'Delete Society']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Society']));
        $role->givePermissionTo(Permission::create(['name'=>'Subscribe Society']));

        //Sports
        $role->givePermissionTo(Permission::create(['name'=>'Edit Sport']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Sport']));
        $role->givePermissionTo(Permission::create(['name'=>'Subscribe Sport']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Sport']));

        //Sections
        $role->givePermissionTo(Permission::create(['name'=>'Create Grade']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Grade']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Grade']));
        $role->givePermissionTo(Permission::create(['name'=>' View Edit Grade']));
       
        //Classroom
        $role->givePermissionTo(Permission::create(['name'=>'Create ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Topic']));

        //lessons
        $role->givePermissionTo(Permission::create(['name'=>'Create Lesson']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Lesson']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Lesson']));

        //Forum
        $role->givePermissionTo(Permission::create(['name'=>'View Forum']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Forum']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Forum']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Forum']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Comment']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Comment']));

        //Subject
        $role->givePermissionTo(Permission::create(['name'=>'Create Subject']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Subject']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Subject']));

         //classSubject
        $role->givePermissionTo(Permission::create(['name'=>'Create ClassSubject']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit ClassSubject']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete ClassSubject']));

        //events
        $role->givePermissionTo(Permission::create(['name'=>'Edit Event']));  
        $role->givePermissionTo(Permission::create(['name'=>'Delete Event']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Event']));

        //tasks
        $role->givePermissionTo(Permission::create(['name'=>'Edit Task']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Task']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Task']));

        //quizzQuestions
        $role->givePermissionTo(Permission::create(['name'=>'Create QuizzQuestion']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit QuizzQuestion']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete QuizzQuestion']));
        
         //quizzQuestionOptions
        $role->givePermissionTo(Permission::create(['name'=>'Create QuizzQuestionOption']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit QuizzQuestionOption']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete QuizzQuestionOption']));

        //quizzTopics
        $role->givePermissionTo(Permission::create(['name'=>'Create QuizzTopic']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit QuizzTopic']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete QuizzTopic']));


    }
}
