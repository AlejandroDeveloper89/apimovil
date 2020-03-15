<?php

use App\Comentary;
use App\Restaurant;
use App\Rol;
use App\User;
use Illuminate\Support\Str;
//use Faker\Generator as Faker;

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
$factory->define(Rol::class, function (Faker\Generator $faker) {
    return [
        'rol' => $faker->word,
    ];
});

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'id_rols'=> $faker->numberBetween(1,10),
    ];
});

$factory->define(Restaurant::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->company,
        'direccion' => $faker->address,
        'telefono' => $faker->numberBetween(5512345678, 6000000000),
        'horario' => $faker->word,
    ];
});

$factory->define(Comentary::class, function (Faker\Generator $faker) {
    return [
        'comentario' => $faker->word,
        'estrellas' => $faker->numberBetween(1,5),
        'aprobado' => $faker->numberBetween(1,2),
        'id_users'=> $faker->numberBetween(1,10),
        'id_restaurants'=> $faker->numberBetween(1,10),
    ];
});
