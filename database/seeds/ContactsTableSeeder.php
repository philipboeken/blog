<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'user_id' => '1',
            'first_name' => 'Jan',
            'surname' => 'de Vries',
            'email' => 'email@email.nl',
            'phonenumber1' => '0612345678',
            'phonenumber1_description' => 'Mobiel',
            'phonenumber2' => '0201234567',
            'phonenumber2_description' => 'Vast',
        ]);

        DB::table('contacts')->insert([
            'user_id' => '2',
            'first_name' => 'Pieter',
            'surname' => 'van de Hoogenband',
            'email' => 'email@hoogenband.com',
            'phonenumber1' => '0698798791',
            'phonenumber1_description' => 'Mobiel',
            'phonenumber2' => '0207654321',
            'phonenumber2_description' => 'Vast',
        ]);
    }
}
