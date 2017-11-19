<?php

use Illuminate\Database\Seeder;


class LinkingTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('label_post')->insert([
            'label_id' => '1',
            'post_id' => '1',
        ]);
        DB::table('contact_post')->insert([
            'contact_id' => '1',
            'post_id' => '1',
        ]);
    }
}
