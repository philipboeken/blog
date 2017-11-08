<?php

use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => '1',
            'file_id' => '1',
            'title' => 'De eerste post',
            'text' => Lipsum::short()->text(1),
        ]);
        DB::table('posts')->insert([
            'user_id' => '1',
            'title' => 'De tweede post',
            'text' => Lipsum::short()->text(2),
        ]);
        DB::table('posts')->insert([
            'user_id' => '2',
            'title' => 'De eerste post van Melanie',
            'text' => Lipsum::short()->text(2),
        ]);
        DB::table('posts')->insert([
            'user_id' => '3',
            'title' => 'De eerste post van Danielle',
            'text' => Lipsum::short()->text(3),
        ]);
        DB::table('posts')->insert([
            'user_id' => '2',
            'title' => 'De tweede post van Melanie',
            'text' => Lipsum::short()->text(3),
        ]);
    }
}
