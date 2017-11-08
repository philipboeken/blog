<?php

use Illuminate\Database\Seeder;


class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            'user_id' => '1',
            'title' => 'afbeelding',
            'extension' => 'png',
            'description' => 'Afbeelding voor bij de eerste post',
            'data' => Lipsum::short()->text(1),
        ]);
    }
}
