<?php

use Illuminate\Database\Migrations\Migration;

class AddInitialUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
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
        DB::table('users')->insert([
            'first_name' => 'Oma',
            'surname' => 'van Schaik',
            'email' => 'cvanschaik@hetnet.nl',
            'password' => bcrypt('password'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::table('users')->select()->delete();
    }
}
