<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        /**
         * Deben ser Seeds
         */
        $this->call(TipoDocumentoSeeder::class);

        $this->call(TipoMedioPagoSeeder::class);

        $this->call(TipoCuentaSeeder::class);

        $this->call(BancoSeeder::class);

        $this->call(EntidadFinancieraSeeder::class);

        $this->call(MedioPagoSeeder::class);

        $this->call(CentroSaludSeeder::class);

        $this->call(ResponsableRecepcionSeeder::class);
    }
}
