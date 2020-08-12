<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medio_pago_id')->nullable();
            $table->unsignedBigInteger('entidad_financiera_id')->nullable();
            $table->unsignedBigInteger('tipo_medio_pago_id')->nullable();
            $table->unsignedBigInteger('tipo_cuenta_id')->nullable();
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->string('razon_social');
            $table->integer('rut')->unique();
            $table->integer('digito_verificador');
            $table->string('numero_cuenta')->nullable();
            $table->string('nombre_contacto')->nullable();
            $table->string('email_contacto')->nullable();
            $table->string('cargo_contacto')->nullable();
            $table->timestamps();

            $table->foreign('medio_pago_id')->references('id')->on('medios_pago');
            $table->foreign('entidad_financiera_id')->references('id')->on('entidades_financieras');
            $table->foreign('tipo_medio_pago_id')->references('id')->on('tipos_medios_pago');
            $table->foreign('tipo_cuenta_id')->references('id')->on('tipos_cuenta');
            $table->foreign('banco_id')->references('id')->on('bancos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
