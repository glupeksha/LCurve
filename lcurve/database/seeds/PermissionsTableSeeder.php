<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        //Announcements
        $role->givePermissionTo(Permission::create(['name'=>'Create Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Announcement']));

        //Society
        $role->givePermissionTo(Permission::create(['name'=>'Create About Us']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit About Us']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Society']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Society']));

        //Sports

        $role->givePermissionTo(Permission::create(['name'=>'Edit Sport']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Sport']));


        //Sections
        $role->givePermissionTo(Permission::create(['name'=>'Create Grade']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Grade']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Grade']));

        //Classroom
        $role->givePermissionTo(Permission::create(['name'=>'Create ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete ClassRoom']));

        //lessons
        $role->givePermissionTo(Permission::create(['name'=>'Create Lesson']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Lesson']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Lesson']));

        //Forum
        $role->givePermissionTo(Permission::create(['name'=>'Create Forum']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Forum']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Forum']));

        //Subject
        $role->givePermissionTo(Permission::create(['name'=>'Create Subject']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Subject']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Subject']));
        
         //classSubject
        $role->givePermissionTo(Permission::create(['name'=>'Create ClassSubject']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit ClassSubject']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete ClassSubject']));

    }
}
