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
        Schema::create('label_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('label_id');
            $table->integer('post_id');
            $table->timestamps();
        });
        Schema::create('file_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id');
            $table->integer('post_id');
            $table->timestamps();
        });
        Schema::create('contact_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->integer('post_id');
            $table->timestamps();
        });
        Schema::create('event_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('post_id');
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
        Schema::create('contact_event', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->integer('event_id');
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
        Schema::dropIfExists('label_post');
        Schema::dropIfExists('file_post');
        Schema::dropIfExists('contact_post');
        Schema::dropIfExists('event_post');
        Schema::dropIfExists('event_user');
        Schema::dropIfExists('event_label');
        Schema::dropIfExists('contact_event');
        Schema::dropIfExists('event_file');
        Schema::dropIfExists('contact_label');
    }
}
