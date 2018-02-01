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
          'name'=>'Matha Fernando',
          'email'=>'admin@lcurve.edu',
          'password'=>'secret',
          'language'=>'en',
        ]);

        $user->assignRole('Admin');
        $user->givePermissionTo('Administrator Permissions');

        $user1 = User::create([
          'name'=>'Juliet Parker',
          'email'=>'juliet_teacher@lcurve.edu',
          'password'=>'asdasd',
          'language'=>'en',
        ]);

        $user1->assignRole('Teacher');

        $user2 = User::create([
          'name'=>'Meily Soiza',
          'email'=>'meily_student@lcurve.edu',
          'password'=>'asdasd',
          'language'=>'si',
        ]);

        $user2->assignRole('Student');

        $user3 = User::create([
          'name'=>'Wenila June',
          'email'=>'wenila_parent@lcurve.edu',
          'password'=>'asdasd',
          'language'=>'si',
        ]);

        $user3->assignRole('Parent');

    }
}
