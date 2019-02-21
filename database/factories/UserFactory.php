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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        //'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), //'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        //'remember_token' => str_random(5),
    ];
});

$factory->define(\App\Models\Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});

$factory->define(\App\Models\Categoria::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,

    ];
});

$factory->define(\App\Models\Documento::class, function (Faker $faker) {

    //código do cliente
    $repositoryCliente = app(\App\Repositories\ClienteRepository::class);
    $clienteId = $repositoryCliente->all()->random()->id;

    //código da categoria
    $repositoryCategoria = app(\App\Repositories\CategoriaRepository::class);
    $categoriaId = $repositoryCategoria->all()->random()->id;


    return [
        'nome' => $faker->word,
        'descricao' => $faker->word,
        'id_categoria' => $categoriaId,
        'id_cliente' => $clienteId,

    ];
});



