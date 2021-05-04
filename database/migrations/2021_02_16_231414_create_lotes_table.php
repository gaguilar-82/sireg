<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
           
            $table->string('ClaveLote',15)->unique();
            $table->string('Macrolote',4)->nullable();
            $table->string('Etapa',4)->nullable();
            $table->string('Seccion',4)->nullable();
            $table->string('Poligono',4)->nullable();
            $table->string('Supermanzana',4)->nullable();
            $table->string('Manzana',4);
            $table->string('NumLote',4);
            $table->string('Casa',4)->nullable();
            $table->string('CodigoPostal',5)->nullable();
            $table->float('Superficie');
            $table->string('Colindancia1')->nullable();
            $table->string('Colindancia2')->nullable();
            $table->string('Colindancia3')->nullable();
            $table->string('Colindancia4')->nullable();
            $table->float('Latitud')->nullable();
            $table->float('Longitud')->nullable();
            $table->string('Uso',15)->nullable();
            $table->string('AltoRiesgo',2)->nullable();
            $table->string('Afectacion',2)->nullable();
            $table->string('Subdivision',2)->nullable();
            $table->string('Fusion',2)->nullable();
            $table->string('Actualizacion',2)->nullable();
            $table->text('ConflictoLegal')->nullable();
            $table->text('ObservacionesLote')->nullable();
            $table->string('Croquis')->nullable();
            
            $table->unsignedBigInteger('colonias_id');//Relación con Colonias

            $table->foreign('colonias_id')//Clave foranea
            ->references('id')->on('colonias')
            ->onDelete('cascade');


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
        Schema::dropIfExists('lotes');
    }
}
