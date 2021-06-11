<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->string('FolioPago',7)->unique();
            $table->date('FechaPago');
            $table->double('CantidadPago');
            $table->text('ObservacionesPago')->nullable();

            $table->unsignedBigInteger('asignados_id');//Relación con Asignados

            $table->foreign('asignados_id')//Clave foranea
            ->references('id')->on('asignados')
            ->onDelete('cascade');

            $table->unsignedBigInteger('conceptos_id');//Relación con Conceptos

            $table->foreign('conceptos_id')//Clave foranea
            ->references('id')->on('conceptos')
            ->onDelete('cascade');

            $table->unsignedBigInteger('users_id')->nullable();//Relación con Users

            $table->foreign('users_id')//Clave foranea
            ->references('id')->on('users')
            ->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
