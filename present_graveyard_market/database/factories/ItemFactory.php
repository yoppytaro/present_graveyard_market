<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\User;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Item::class, function (Faker $faker) {
    $file = UploadedFile::fake()->image('item.jpg');
    $path = $file->store('public');
    $set_user_id = User::select('id')->inRandomOrder()->first()->id;
    $set_category_id = Category::select('id')->inRandomOrder()->first()->id;

    return [
        'user_id' => $set_user_id,
        'category_id' => $set_category_id,
        'name' => $faker->realText($maxNbChars = 20),
        'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'price' => $faker->numberBetween($min = 100, $max = 50000),
        'image' => $path,
    ];
});