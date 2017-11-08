<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('label_id');
            $table->timestamps();
        });
        Schema::create('post_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('file_id');
            $table->timestamps();
        });
        Schema::create('post_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('contact_id');
            $table->timestamps();
        });
        Schema::create('post_event', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('event_id');
            $table->timestamps();
        });
        Schema::create('event_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('event_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('label_id');
            $table->timestamps();
        });
        Schema::create('event_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('contact_id');
            $table->timestamps();
        });
        Schema::create('event_file', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('file_id');
            $table->timestamps();
        });
        Schema::create('contact_label', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->integer('label_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_label');
        Schema::dropIfExists('post_file');
        Schema::dropIfExists('post_contact');
        Schema::dropIfExists('post_event');
        Schema::dropIfExists('event_user');
        Schema::dropIfExists('event_label');
        Schema::dropIfExists('event_contact');
        Schema::dropIfExists('event_file');
        Schema::dropIfExists('contact_label');
    }
}
