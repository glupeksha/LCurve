<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	  $this->call(RolesTableSeeder::class);
      	$this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SocietiesTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);

    }
}
