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
        $role=Role::find(1);
        $role->givePermissionTo(Permission::create(['name'=>'Administrator Permissions']));
        $role->givePermissionTo(Permission::create(['name'=>'Create Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Delete Announcement']));
        $role->givePermissionTo(Permission::create(['name'=>'Create About Us']));
        $role->givePermissionTo(Permission::create(['name'=>'Edit About Us']));
    }
}
