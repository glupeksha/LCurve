<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
          'name'=>'Admin',
          'email'=>'admin@lcurve.edu',
          'password'=>'secret',
          'language'=>'en',
        ]);
        
        $user->assignRole('Admin');
        $user->givePermissionTo('Administrator Permissions');
    }
}
