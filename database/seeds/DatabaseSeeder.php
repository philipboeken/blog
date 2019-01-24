<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(CommentsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(LabelsTableSeeder::class);
        $this->call(LinkingTablesSeeder::class);
        $this->call(PostsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
