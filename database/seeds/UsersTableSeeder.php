<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Philip',
            'surname' => 'Boeken',
            'email' => 'philip.boeken@gmail.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Melanie',
            'surname' => 'Hooftman',
            'email' => 'melaniehooftman@gmail.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Danielle',
            'surname' => 'Hooftman',
            'email' => 'hooftmandanielle@gmail.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Sanne',
            'surname' => 'Boeken',
            'email' => 'sanne.c.boeken@gmail.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Hélène',
            'surname' => 'Hooftman',
            'email' => 'hcvschaik@hotelmijvanschaik.nl',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Jeanine',
            'surname' => 'van Schaik',
            'email' => 'jcvschaik@hotelmijvanschaik.nl',
            'password' => bcrypt('password'),
        ]);
    }
}
