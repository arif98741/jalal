<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Project;
use App\Model\ProjectCategory;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'project_title' 		=> ucfirst($faker->text(10)),
        'project_id' 			=> rand(1111111,9999999),
        'project_category_id'   => ProjectCategory::all()->random(),
        'actors' 				=> ucfirst($faker->text(10)),
        'author'                => $faker->firstNameMale.' '.$faker->lastName,
        'requirement_analysis' 	=> ucfirst($faker->text(100)),
        'documentation'			=> ucfirst($faker->text(100)),
        'report' 			    => ucfirst($faker->text(50)),
        'summary' 				=> ucfirst($faker->text(100)),
        'flowchart' 			=> ucfirst($faker->text(10)).'.jpg',
    ];
});
