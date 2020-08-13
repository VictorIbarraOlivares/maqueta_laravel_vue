<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Banco;
use App\Archivo;
use App\MedioPago;
use App\TipoCuenta;
use App\CentroSalud;

use App\TipoMedioPago;
use App\EntidadFinanciera;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verificado' => $verificado = $faker->randomElement([ User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO ]),
        'token_verificacion' => $verificado == User::USUARIO_VERIFICADO ? null : User::generarTokenVerificacion(),
        'admin' => $faker->randomElement([ User::USUARIO_ADMINISTRADOR, User::USUARIO_REPRESENTANTE ]),
    ];
});




$factory->define(Proveedor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
    ];
});

$factory->define(OrdenCompra::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
    ];
});

$factory->define(Documento::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
    ];
});



/**
 * Deben ser Seeds
 */
$factory->define(TipoDocumento::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['cuenta corriente', 'cuenta rut', 'cuenta vista']),
    ];
});

$factory->define(TipoMedioPago::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
    ];
});

$factory->define(TipoCuenta::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['cuenta corriente', 'cuenta rut', 'cuenta vista']),
    ];
});

$factory->define(Banco::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['banco bci', 'banco de chile', 'scotiabank', 'santander', 'banco falabella']),
    ];
});

$factory->define(EntidadFinanciera::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['banco bci', 'banco de chile', 'scotiabank', 'santander', 'banco falabella']),
    ];
});

$factory->define(MedioPago::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['banco bci', 'banco de chile', 'scotiabank', 'santander', 'banco falabella']),
    ];
});

$factory->define(CentroSalud::class, function (Faker $faker) {
    return [
        'establecimiento' => $faker->word,
        'comuna' => $faker->word,
        'unidad_dependencia' => $faker->word,
    ];
});

$factory->define(ResponsableRecepcion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
    ];
});
