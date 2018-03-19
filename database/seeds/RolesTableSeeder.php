<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('roles')->insert([
		    ['role' => 'top',       'permission' => 1, 'branch' => 1],
		    ['role' => 'editor',    'permission' => 2, 'branch' => 7],
		    ['role' => 'head',      'permission' => 3, 'branch' => 2],
		    ['role' => 'head',      'permission' => 3, 'branch' => 3],
		    ['role' => 'head',      'permission' => 3, 'branch' => 4],
		    ['role' => 'head',      'permission' => 3, 'branch' => 5],
		    ['role' => 'head',      'permission' => 3, 'branch' => 6],
		    ['role' => 'member',    'permission' => 4, 'branch' => 2],
		    ['role' => 'member',    'permission' => 4, 'branch' => 3],
		    ['role' => 'member',    'permission' => 4, 'branch' => 4],
		    ['role' => 'member',    'permission' => 4, 'branch' => 5],
		    ['role' => 'member',    'permission' => 4, 'branch' => 6],
	    ]);
    }
}


