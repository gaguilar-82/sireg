<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoniasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colonias', function (Blueprint $table) {
            $table->id();
            $table->string('NombreColonia');
            $table->string('TipoColonia');
            $table->string('ClaveColonia',9)->unique();
            $table->float('ValorMetroCuadrado',8,2);
            $table->text('TituloPropiedad')->nullable();
            $table->text('Lotificacion')->nullable();
            $table->text('SuperficieAdquirida')->nullable();
            $table->text('ObservacionesColonia')->nullable();

            $table->unsignedBigInteger('municipios_id');//Relación con Municipios

            $table->foreign('municipios_id')//Clave foranea
            ->references('id')->on('municipios')
            ->onDelete('cascade');

            $table->unsignedBigInteger('users_id')->nullable();//Relación con Users

            $table->foreign('users_id')//Clave foranea
            ->references('id')->on('users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('colonias');
    }
}
