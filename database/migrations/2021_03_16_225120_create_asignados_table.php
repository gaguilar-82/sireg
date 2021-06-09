<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignados', function (Blueprint $table) {
            $table->id();

            $table->string('ClaveContrato')->unique();
            $table->double('CostoLote');
            $table->double('CostoEscrituras');
            $table->date('FechaContrato');
            $table->string('TipoContrato');
            $table->integer('Mensualidades')->nullable();
            $table->string('ParaEscriturar',2)->nullable();
            $table->text('ObservacionesAsignado')->nullable();

            $table->unsignedBigInteger('lotes_id')->unique();//Relación con Lotes

            $table->foreign('lotes_id')//Clave foranea
            ->references('id')->on('lotes')
            ->onDelete('cascade');

            $table->unsignedBigInteger('posesionarios_id')->unique();//Relación con Posesionarios

            $table->foreign('posesionarios_id')//Clave foranea
            ->references('id')->on('posesionarios')
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
        Schema::dropIfExists('asignados');
    }
}
