<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('email')->unique();
	        $table->string('trello_id');
	        $table->string('password');
	        $table->rememberToken();
	        $table->boolean('master');
	        $table->integer('role');
	        $table->timestamp('last_visit');
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
        Schema::dropIfExists('users');
    }
}
