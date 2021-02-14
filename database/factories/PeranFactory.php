<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Peran;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Peran::class, function (Faker $faker) {
    return [
        'nama'          => 'Admin',
        'slug'          => Str::slug('Admin', '-')
    ];
});
