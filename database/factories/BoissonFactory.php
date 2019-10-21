<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Boisson;
use Faker\Generator as Faker;

$factory->define(Boisson::class, function (Faker $faker) {
    return [
        'prix_achat' => $faker->randomElement(array(100,200,300)),
        'prix_vente' => $faker->randomElement(array(400,500,600))
    ];
});
