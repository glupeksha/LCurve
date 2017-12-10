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

        $this->call(SocietiesTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(ClassRoomsTableSeeder::class);
        $this->call(ClassSubjectsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(SportTableSeeder::class);
        $this->call(TasksTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(quizzQuestionsTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(ForumsTableSeeder::class);
    }
}
