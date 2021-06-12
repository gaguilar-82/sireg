<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeccions', function (Blueprint $table) {
            $table->id();

            $table->date('FechaInspeccion');
            $table->string('UsoVivienda');
            $table->string('MaterialVivienda');
            $table->string('MaterialMuros');
            $table->string('MaterialTecho');
            $table->string('MaterialPiso');
            $table->string('ZAR',2);
            $table->string('EnergiaElectrica',2);
            $table->string('AguaPotable',2);
            $table->string('Drenaje',2);
            $table->integer('Antiguedad');
            $table->integer('Habitantes');
            $table->integer('Habitaciones');
            $table->float('GastoAlimentacion',8,2);
            $table->float('GastoSalud',8,2);
            $table->float('GastoEducacion',8,2);
            $table->float('GastoOtros',8,2);
            $table->float('GastoTotal',8,2);
            $table->string('SeguridadSocial')->nullable();
            $table->text('ObservacionesInspeccion')->nullable();

            $table->unsignedBigInteger('asignados_id');//Relación con Asignados

            $table->foreign('asignados_id')//Clave foranea
            ->references('id')->on('asignados')
            ->onDelete('cascade');

            $table->unsignedBigInteger('inspectors_id');//Relación con Inspectores

            $table->foreign('inspectors_id')//Clave foranea
            ->references('id')->on('inspectors')
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
        Schema::dropIfExists('inspeccions');
    }
}
