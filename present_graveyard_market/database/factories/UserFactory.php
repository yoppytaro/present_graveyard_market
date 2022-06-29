<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

$factory->define(User::class, function (Faker $faker) {
    $file = UploadedFile::fake()->image('avatar.jpg');
    $path = $file->store('public');

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'image' => $path,
        'profile' => $faker->realText($maxNbChars = 50, $indexSize = 2)
    ];
});
