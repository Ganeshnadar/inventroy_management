<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'id'   => $faker->uuid,
        'name' => $faker->name,
        'photo' => $faker->imageUrl($width = 640, $height = 480, 'food'),
        'qty' => $faker->randomNumber(2),
        'category_id' => function() {
            return factory(App\Category::class)->create()->id;
        },
        'price' => $faker->randomNumber(2),
        'is_active' => rand(0,1),
    ];
});
