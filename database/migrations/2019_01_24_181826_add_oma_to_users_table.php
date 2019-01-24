<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOmaToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->insert([
                'first_name' => 'Oma',
                'surname' => 'van Schaik',
                'email' => 'cvanschaik@hetnet.nl',
                'password' => bcrypt('password'),
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->where('first_name', 'Oma')->delete();
        });
    }
}
