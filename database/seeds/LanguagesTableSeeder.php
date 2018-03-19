<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('languages')->insert([
		    'lang_code' => 'ru',
		    'title' => 'Русский',
	    ]);
	
	    DB::table('languages')->insert([
		    'lang_code' => 'en',
		    'title' => 'English',
	    ]);
    }
}
