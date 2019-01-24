<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('files')->insert([
            'user_id' => '1',
            'post_id' => '1',
            'name' => 'afbeelding',
            'extension' => 'png',
            'type' => 'image',
            'description' => 'Afbeelding voor bij de eerste post'
        ]);
    }
}
