<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('orden_compra_id');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->unsignedBigInteger('centro_salud_id');
            $table->unsignedBigInteger('responsable_recepcion_id');
            $table->date('fecha_documento');
            $table->unsignedInteger('numero_documento');
            $table->unsignedBigInteger('monto_total');
            $table->date('fecha_recepcion');
            $table->text('observacion')->nullable();
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('orden_compra_id')->references('id')->on('ordenes_compra');
            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos');
            $table->foreign('centro_salud_id')->references('id')->on('centros_salud');
            $table->foreign('responsable_recepcion_id')->references('id')->on('responsables_recepcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
