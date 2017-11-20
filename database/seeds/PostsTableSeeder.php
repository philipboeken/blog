<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


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
            'created_at' => Carbon::createFromDate(2012, 1, 1)->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'user_id' => '1',
            'title' => 'De tweede post',
            'text' => Lipsum::short()->text(2),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'user_id' => '2',
            'title' => 'De eerste post van Melanie',
            'text' => Lipsum::short()->text(2),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'user_id' => '3',
            'title' => 'De eerste post van Danielle',
            'text' => Lipsum::short()->text(3),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('posts')->insert([
            'user_id' => '2',
            'title' => 'De tweede post van Melanie',
            'text' => Lipsum::short()->text(3),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
