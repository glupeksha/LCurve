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

        $user1 = User::create([
          'name'=>'Teacher',
          'email'=>'teach@lcurve.edu',
          'password'=>'123456',
          'language'=>'en',
        ]);

        $user1->assignRole('Teacher');
    }
}
