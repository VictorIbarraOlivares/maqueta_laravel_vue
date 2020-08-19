<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Archivo;
use App\Proveedor;
use App\Documento;
use App\MedioPago;
use App\TipoCuenta;
use App\OrdenCompra;
use App\CentroSalud;
use App\TipoMedioPago;
use App\TipoDocumento;
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
    $monto = $faker->numberBetween(1000, 10000000);
    return [
        'proveedor_id' => Proveedor::all()->random()->id,
        'numero' => '1641-'. $faker->numberBetween(600, 2000) .'-SE20', 
        'monto' => $monto,
        'saldo' => $monto
        // 'estado' Arreglar en el documento factory
    ];
});

$factory->define(Documento::class, function (Faker $faker) {
    /**
     * Obtener proveedor con al menos una orden de compra con estado disponible
     */
    $proveedor = Proveedor::whereHas('ordenes_compra', function ($query){
        $query->where('estado', OrdenCompra::OC_DISPONIBLE);
    })->radmon();

    $oc = OrdenCompra::where('proveedor_id', $proveedor->id)
                     ->where('estado', OrdenCompra::OC_DISPONIBLE)
                     ->random();

    $consumeTotalOc = $faker->randomElement(['SI', 'NO']);
    $montoDocumento = 0;
    if ( $consumeTotalOc == 'SI' ) {
        $montoDocumento = $oc->saldo;
        $oc->saldo = 0;
        $oc->estado = OrdenCompra::OC_NO_DISPONIBLE;
        $oc->save();
    } else {
        $montoDocumento = $faker->numberBetween(1, $oc->saldo);
        $oc->saldo -= $montoDocumento;
        $oc->estado = $oc->saldo == 0 ? OrdenCompra::OC_NO_DISPONIBLE : OrdenCompra::OC_DISPONIBLE;
        $oc->save();
    }

    $centroSalud = CentroSalud::all()->random();
    $responsableRecepcion = ResponsableRecepcion::where('centro_salud_id', $centroSalud->id)->random();

    $fechaActual = date('Y-m-d');
    return [
        'proveedor_id' => $proveedor->id,
        'orden_compra_id' => $oc->id,
        'tipo_documento_id' => TipoDocumento::all()->random()->id,
        'centro_salud_id' => $centroSalud->id,
        'responsable_recepcion_id' => $responsableRecepcion->id,
        'fecha_documento' => date("Y-m-d", strtotime($fechaActual."- 1 week") ),
        'numero_documento' => $faker->numberBetween(1000, 100000),
        'monto_total' => $montoDocumento,
        'fecha_recepcion' => date("Y-m-d", strtotime($fechaActual."- 3 days") ),
        'observacion' => $faker->randomElement([ null, $faker->paragraph(1) ]),
    ];
});

$factory->define(Archivo::class, function (Faker $faker) {
    return [
        'documento_id' => Documento::doesntHave('archivos')->random()->id,
        'url' => $faker->randomElement(['uno.pdf', 'dos.pdf', 'tres.pdf']),
        'nombre' => $faker_word,
    ];
});



