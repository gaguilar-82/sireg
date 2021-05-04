<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosesionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posesionarios', function (Blueprint $table) {
            $table->id();

            $table->string('NombrePosesionario');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->string('CURP',18)->unique();
            $table->string('LugarNacimiento');
            $table->date('FechaNacimiento');
            $table->string('EstadoCivil');
            $table->string('Ocupacion');
            $table->string('Telefono',10);
            $table->string('ActaNacimiento')->nullable();
            $table->string('ActaMatrimonio')->nullable();
            $table->string('ActaHijos')->nullable();
            $table->string('IdentificacionOficial')->nullable();
            $table->string('ComprobanteDomicilio')->nullable();
            $table->string('ConstanciaNoPropiedad')->nullable();
            $table->string('ConstanciaSolteria')->nullable();
            $table->string('PoderNotarial')->nullable();
            $table->text('ObservacionesPosesionario')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posesionarios');
    }
}
