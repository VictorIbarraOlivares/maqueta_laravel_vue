<?php

use App\User;
use App\Banco;
use App\Archivo;
use App\Proveedor;
use App\MedioPago;
use App\Documento;
use App\TipoCuenta;
use App\CentroSalud;
use App\OrdenCompra;
use App\TipoDocumento;
use App\TipoMedioPago;
use App\Representante;
use App\EntidadFinanciera;
use App\ResponsableRecepcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Ejecutar las seeds 
         * 1° php artisan migrate
         * 2° php artisan db:seed
         */
        
        // Desactiva el checkeo de las llaves foraneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        TipoDocumento::truncate();
        TipoMedioPago::truncate();
        TipoCuenta::truncate();
        Banco::truncate();
        EntidadFinanciera::truncate();
        MedioPago::truncate();
        CentroSalud::truncate();
        ResponsableRecepcion::truncate();
        User::truncate();
        Proveedor::truncate();
        DB::table('proveedor_representante')->truncate();
        OrdenCompra::truncate();
        Documento::truncate();
        Archivo::truncate();

        // Desactiva los eventos relacionados a los modelos
        // User::flushEventListeners();

        $this->call(TipoDocumentoSeeder::class);
        $this->call(TipoMedioPagoSeeder::class);
        $this->call(TipoCuentaSeeder::class);
        $this->call(BancoSeeder::class);
        $this->call(EntidadFinancieraSeeder::class);
        $this->call(MedioPagoSeeder::class);
        $this->call(CentroSaludSeeder::class);
        $this->call(ResponsableRecepcionSeeder::class);

        $cantidadUsuarios = 1000;
        $cantidadProveedores = 500;
        $cantidadOrdenesCompra = 500;
        $cantidadDocumentos = 500;
        $cantidadArchivos = 500;

        factory(User::class, $cantidadUsuarios)->create();

        factory(Proveedor::class, $cantidadProveedores )->create()->each(
            function($proveedor) {
                if ( Representante::where('admin', User::USUARIO_REPRESENTANTE)->get()->count() > 0 ) {
                    $representantes = Representante::where('admin', User::USUARIO_REPRESENTANTE)
                                                //    ->where('verificado', User::USUARIO_VERIFICADO)
                                                // ->doesntHave('proveedores')
                                                ->get()->random()->pluck('id');
                                                //    ->random( mt_rand(1, 2) )->pluck('id');
                    $proveedor->representantes()->attach($representantes);
                }
            }
        );

        factory(OrdenCompra::class, $cantidadOrdenesCompra)->create();
        factory(Documento::class, $cantidadDocumentos)->create();
        factory(Archivo::class, $cantidadArchivos)->create();

    }
}
