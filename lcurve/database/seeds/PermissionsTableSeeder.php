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

        //Announcements
        $role->givePermissionTo(Permission::create(['name'=>'Create Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Announcement']));

        //Sections
        $role->givePermissionTo(Permission::create(['name'=>'Create Section']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Section']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Section']));

         //ClassRoom
        $role->givePermissionTo(Permission::create(['name'=>'Create ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit ClassRoom']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete ClassRoom']));
    }
}
