<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Species::class, function (Faker\Generator $faker) {

    return [
        'nama_lokal' => $faker->name,
        'spesies' => $faker->name,
        'genus' => $faker->name,
        'famili' => $faker->name,
        'ordo' => $faker->name,
        'subkelas' => $faker->name,
        'kelas' => $faker->name,
        'divisi' => $faker->name,
        'superdivisi' => $faker->name,
        'subkingdom' => $faker->name,
        'kingdom' => $faker->name,
        'botani' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'syarat_tumbuh' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'manfaat' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'image' => 'noimage.jpg',
    ];
});
