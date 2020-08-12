<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProveedorRepresentanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor_representante', function (Blueprint $table) {
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('representante_id');

            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('representante_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor_representante');
    }
}
