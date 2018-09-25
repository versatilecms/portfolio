<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Versatile\Portfolio\Portfolio::class, function (Faker $faker) {
    return [
        'name' => 'Default Category',
        'slug' => 'default-category',
        'parent_id' => null,
        'order' => 1,
    ];
});
