composer<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('branches')->insert([
		    ['branch' => 'management'],
		    ['branch' => 'development'],
		    ['branch' => 'design'],
		    ['branch' => 'marketing'],
		    ['branch' => 'sales'],
		    ['branch' => 'support'],
		    ['branch' => 'general'],
	    ]);
    }
}
