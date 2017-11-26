<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Philip',
            'surname' => 'Boeken',
            'email' => 'test1@test.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Melanie',
            'surname' => 'Hooftman',
            'email' => 'test2@test.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Danielle',
            'surname' => 'Hooftman',
            'email' => 'test3@test.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Sanne',
            'surname' => 'Boeken',
            'email' => 'test4@test.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Floor',
            'surname' => 'Otsen',
            'email' => 'floor@otsen.nl',
            'password' => bcrypt('Willem95'),
        ]);
    }
}
