<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\Item;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    $users = User::select('id')->get()->toArray();

    $setLIkeData = array_map(function ($user) {
        return [
            'user_id' => $user->id,
            'item' => Item::select('id')->inRandomOrder()->first()->id
        ];
    }, $users);

    return $setLIkeData;
});
