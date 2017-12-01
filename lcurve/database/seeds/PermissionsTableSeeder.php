<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'Administrator Permissions']);
        Permission::create(['name'=>'Create Announcement']);
        Permission::create(['name'=>'Edit Announcement']);
        Permission::create(['name'=>'Delete Announcement']);
    }
}
