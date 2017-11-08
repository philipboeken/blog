<?php

use Illuminate\Database\Seeder;


class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            'user_id' => '1',
            'title' => 'Installatie',
            'color' => '#4286f4',
            'is_mutable' => true
        ]);
    }
}
