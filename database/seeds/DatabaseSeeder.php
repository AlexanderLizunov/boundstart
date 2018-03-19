<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(BranchesTableSeeder::class);
    	$this->call(PermissionsTableSeeder::class);
	    $this->call(RolesTableSeeder::class);
	    $this->call(UsersTableSeeder::class);
	    $this->call(LanguagesTableSeeder::class);
//	    $this->call(ArticlesTableSeeder::class);
	    $this->call(InstructionsTableSeeder::class);
    }
}
