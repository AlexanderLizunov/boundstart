<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('articles_contents', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('article_id')->length(11)->unsigned();
		    $table->foreign('article_id')
		          ->references('article_id')->on('articles')
		          ->onDelete('cascade');
		    $table->integer('lang_id')->length(11);
		    $table->string('meta_title', 80);
		    $table->string('meta_description', 200);
		    $table->string('meta_keywords', 250);
		    $table->string('title', 256);
		    $table->string('subtitle', 256);
		    $table->text('body');
		    $table->string('preview_text', 128);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::drop('articles_contents');
    }
}
