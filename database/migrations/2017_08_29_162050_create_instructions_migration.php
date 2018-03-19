<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('instructions', function (Blueprint $table) {
		    $table->increments('instruction_id');
		    $table->integer('branch_id')->length(11);
		    $table->string('title', 128);
		    $table->string('preview', 128);
		    $table->text('body');
		    $table->string('image', 128);
		    $table->boolean('published');
		    $table->integer('created_by')->length(11);
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
	    Schema::drop('instructions');
    }
}
