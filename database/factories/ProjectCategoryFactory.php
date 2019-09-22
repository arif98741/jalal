<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ProjectCategory;
use Faker\Generator as Faker;

$factory->define(ProjectCategory::class, function (Faker $faker) {
    return [
        'category_name' => ucfirst($faker->text(10))
    ];
});
