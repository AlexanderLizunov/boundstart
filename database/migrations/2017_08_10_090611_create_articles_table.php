<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('articles', function (Blueprint $table) {
		    $table->increments('article_id');
		    $table->integer('created_by')->unsigned();
		    $table->foreign('created_by')
		          ->references('id')->on('users');
		    $table->string('slug')->unique();
		    $table->string('image', 256);
		    $table->timestamp('published_at');
		    $table->timestamps();
		    $table->integer('views');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('articles');
    }
}
