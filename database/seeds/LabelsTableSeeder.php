<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('labels')->insert([
            'user_id' => '1',
            'title' => 'Algemeen',
            'color' => '#4286f4',
        ]);
    }
}
