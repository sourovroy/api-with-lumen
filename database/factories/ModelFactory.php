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

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $image = file_get_contents($faker->imageUrl(640, 480));
    $filename = uniqid().'.jpeg';
    $path = base_path('public/images/'.$filename);
    file_put_contents($path, $image);

    return [
        'title' => $faker->sentence(4),
        'content' => $faker->paragraph(4),
        'user_id' => mt_rand(1, 2),
        'image_url' => 'https://api.sourov.im/images/'.$filename,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->paragraph(1),
        'post_id' => mt_rand(1, 50),
        'user_id' => mt_rand(1, 2)
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $hasher = app()->make('hash');
    $email = $faker->email;
    return [
        'name' => $faker->name,
        'email' => $email,
        'password' => $hasher->make("secret"),
        'api_token' => md5($email)
    ];
});
