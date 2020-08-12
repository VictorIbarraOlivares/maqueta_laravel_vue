<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesRecepcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables_recepcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centro_salud_id');
            $table->string('nombre');
            $table->integer('rut')->nullable()->unique();
            $table->integer('digito_verificador')->nullable();
            $table->string('fono')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

            $table->foreign('centro_salud_id')->references('id')->on('centros_salud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables_recepcion');
    }
}
