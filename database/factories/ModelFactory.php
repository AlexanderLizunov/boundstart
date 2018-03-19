<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'trello_id' => $faker->uuid,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'master' => 0,
        'role' => rand(1, 12)
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'created_by'        => factory(App\User::class)->create()->id,
		'slug'              => $faker->slug,
		'image'             => $faker->image(),
		'published_at'      => \Carbon\Carbon::now(),
		'created_at'        => \Carbon\Carbon::now(),
		'updated_at'        => \Carbon\Carbon::now(),
		'views'             => rand(0, 1500),
	];
});

$factory->define(App\ArticleContent::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'article_id'        => factory(App\Article::class)->create()->article_id,
		'lang_id'           => rand(1, 2),
		'meta_title'        => $faker->text(80),
		'meta_description'  => $faker->text(200),
		'meta_keywords'     => $faker->text(250),
		'title'             => $faker->text(256),
		'subtitle'          => $faker->text(256),
		'body'              => $faker->paragraph(7),
		'preview_text'      => $faker->sentence,
	];
});

$factory->define(App\Wiki\Instruction::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'created_by'        => factory(App\User::class)->create()->id,
		'branch_id'         => rand(1,7),
		'title'             => $faker->text(128),
		'preview'           => $faker->text(128),
		'body'              => $faker->text(512),
		'image'             => $faker->image(),
		'published'         => rand(0, 1),
	];
});


$factory->define(App\Wiki\Role::class, function (Faker\Generator $faker) use ($factory) {
	return [
		'role_id'        => factory(App\Article::class)->create()->article_id,
		'role'           => rand(1, 2),
	];
});



