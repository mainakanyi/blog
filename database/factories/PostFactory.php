<?php

use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'contents'=>$faker->paragraph(6)
    ];
});
