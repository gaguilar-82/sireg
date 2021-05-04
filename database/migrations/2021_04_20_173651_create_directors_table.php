<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();

            $table->string('NombreDirector');
            $table->string('ApellidoPaternoDirector');
            $table->string('ApellidoMaternoDirector');
            $table->date('FechaNacimientoDirector');
            $table->string('LugarNacimientoDirector');
            $table->string('EstadoCivilDirector');
            $table->date('FechaNombramiento');
            $table->string('ExpedidoPor');
            $table->text('ActaPublica');

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
        Schema::dropIfExists('directors');
    }
}
