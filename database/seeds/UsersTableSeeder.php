<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
		    'name' => "BogdanKuts",
		    'email' => "bogdan@boundstart.com",
		    'trello_id' => '540de01c90098ad0bcbe077b',
		    'password' => bcrypt('Bik041194bodya'),
		    'remember_token' => str_random(10),
		    'master' => 1,
	        'role' => 1
	    ]);
	    DB::table('users')->insert([
		    'name' => "AlexLizunov",
		    'email' => "alex@boundstart.com",
		    'trello_id' => '58eb2c6d638adb7711ce19ab',
		    'password' => bcrypt('m16a1ak47'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 8
	    ]);
	    DB::table('users')->insert([
		    'name' => "NastyaShendrik",
		    'email' => "nastya@boundstart.com",
		    'trello_id' => '58eb2d32ba571cd237e375ef',
		    'password' => bcrypt('3Vbkjcnm3'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 9
	    ]);
//	    DB::table('users')->insert([
//		    'name' => "AntonGorbenko",
//		    'email' => "anton@boundstart.com",
//		    'trello_id' => '5922d0fbd1f5bc3cb2b1fa4a',
//		    'password' => bcrypt('39864431q'),
//		    'remember_token' => str_random(10),
//		    'master' => 0,
//		    'role' => 10
//	    ]);
	    DB::table('users')->insert([
		    'name' => "DimaShlyakhov",
		    'email' => "dima@boundstart.com",
		    'trello_id' => '5882021c4f8cb3bde5fd3d07',
		    'password' => bcrypt('dima3579'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 1
	    ]);
	    DB::table('users')->insert([
		    'name' => "NickShlyakhov",
		    'email' => "nick@boundstart.com",
		    'trello_id' => '5883d5b966c8030ad8a72317',
		    'password' => bcrypt('Boundstart2016nd'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 1
	    ]);
	    DB::table('users')->insert([
		    'name' => "OlegGubanov",
		    'email' => "oleg@boundstart.com",
		    'trello_id' => '59a3d8047778377be5f1b421',
		    'password' => bcrypt('dOxO000364352'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 11
	    ]);
	    DB::table('users')->insert([
		    'name' => "EvgeniyStadnichenko",
		    'email' => "evgeniy@boundstart.com",
		    'trello_id' => '599d81534f569bfc198cb6c6',
		    'password' => bcrypt('MHGCXHNR2017'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 11
	    ]);
	    DB::table('users')->insert([
		    'name' => "LeraGuzhva",
		    'email' => "valeria@boundstart.com",
		    'trello_id' => '59dc680090dc7b3fdcbfc560',
		    'password' => bcrypt('Guzhva2605lera'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 10
	    ]);
	    DB::table('users')->insert([
		    'name' => "YaroslavSkoryk",
		    'email' => "yaroslav@boundstart.com",
		    'trello_id' => '59ddbda0a09eec2bcd37c96c',
		    'password' => bcrypt('Skorefan12'),
		    'remember_token' => str_random(10),
		    'master' => 0,
		    'role' => 10
	    ]);
    }
}
