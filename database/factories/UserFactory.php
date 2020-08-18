<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;

use App\Proveedor;
use App\Documento;
use App\MedioPago;
use App\TipoCuenta;
use App\OrdenCompra;
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
        'medio_pago_id' => MedioPago::all()->random()->id,
        'entidad_financiera_id' => EntidadFinanciera::all()->random()->id,
        'tipo_medio_pago_id' => TipoMedioPago::all()->random()->id,
        'tipo_cuenta_id' => TipoCuenta::all()->random()->id,
        'banco_id' => Banco::all()->random()->id,
        'razon_social' => $faker->name,
        'rut' => $faker->numberBetween(10000000, 19000000),
        'digito_verificador' => $faker->numberBetween(0,9)
    ];
});

$factory->define(OrdenCompra::class, function (Faker $faker) {
    $monto = $faker->numberBetween(1, 10000000);
    return [
        'proveedor_id' => Proveedor::all()->random()->id,
        'numero' => $faker->word, // Arreglar formato
        'monto' => $monto,
        'saldo' => $monto
        // 'estado' Arreglar en el documento factory
    ];
});

$factory->define(Documento::class, function (Faker $faker) {
    /**
     * Obtener proveedor con al menos una orden de compra
     */
    return [
        'nombre' => $faker->word,
    ];
});
/**
 * Faltan los archivos
 */



