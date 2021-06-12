<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscriturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escrituras', function (Blueprint $table) {
            $table->id();

            $table->string('FolioEscritura',14)->unique();
            $table->date('FechaEscritura');
            $table->string('FirmaPosesionario',2)->nullable();
            $table->string('FirmaDirector',2)->nullable();
            $table->string('Forma3DCC',2)->nullable();
            $table->date('FechaIngresoRPP')->nullable();
            $table->string('OficioRPP')->nullable();
            $table->string('FolioRealElectronico')->nullable();
            $table->date('FechaInscripcionRPP')->nullable();
            $table->date('FechaEntrega')->nullable();
            $table->text('ObservacionesEscritura')->nullable();

            $table->unsignedBigInteger('asignados_id')->unique();//Relación con Asignados

            $table->foreign('asignados_id')//Clave foranea
            ->references('id')->on('asignados')
            ->onDelete('cascade');

            $table->unsignedBigInteger('directors_id');//Relación con Directors

            $table->foreign('directors_id')//Clave foranea
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
        Schema::dropIfExists('escrituras');
    }
}
