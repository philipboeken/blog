<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'user_id' => '1',
            'title' => '1',
            'description' => 'De eerste post',
            'location' => 'locatie A',
            'start_date' => Carbon::now()->toDateTimeString(),
            'stop_date' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
