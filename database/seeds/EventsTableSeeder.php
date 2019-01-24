<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('events')->insert([
            'user_id' => '1',
            'title' => 'event 1',
            'note' => 'De eerste post',
            'location' => 'locatie A',
            'start' => Carbon::now()->toDateTimeString(),
            'end' => Carbon::now()->toDateTimeString(),
            'allDay' => true
        ]);

        DB::table('events')->insert([
            'user_id' => '1',
            'title' => 'Familiebijeenkomst 1',
            'note' => '',
            'location' => 'Kantoor',
            'start' => Carbon::create(2018, 3, 29, 19, 30, 0)->toDateTimeString(),
            'end' => Carbon::create(2018, 3, 29, 22, 0, 0)->toDateTimeString(),
            'allDay' => false
        ]);

        DB::table('events')->insert([
            'user_id' => '1',
            'title' => 'Familiebijeenkomst',
            'note' => 'Jaarrekening doornemen',
            'location' => 'locatie A',
            'start' => Carbon::create(2018, 7, 28, 20, 0, 0)->toDateTimeString(),
            'end' => Carbon::create(2018, 7, 28, 22, 0, 0)->toDateTimeString(),
            'allDay' => false
        ]);
    }
}
