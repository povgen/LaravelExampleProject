<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1,5) > 1;

    $createdAt = $faker->dateTimeBetween('-3 month', '-2 month');

    $data = [
		'category_id'	=> rand(1,11),
		'title'			=> $title,
		'slug'			=> Str::slug($title),
		'description'	=> $txt,

		'image_url'		=> $faker->imageUrl(320, 240, 'cats', true, 'Faker', true),
		'vendor_code' 	=> $faker->unique()->postcode,
		'price' 		=> rand(1,10000),
		'availabl'		=> $faker->boolean,

		'created_at'	=> $createdAt,
		'updated_at'	=> $createdAt,
    ];

    return $data;
});
