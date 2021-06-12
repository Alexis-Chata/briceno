<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->text('link')->nullable();
            $table->text('codigo')->nullable();
            $table->text('contrasena')->nullable();
            $table->text('puntaje')->nullable();
            $table->text('puesto')->nullable();
            $table->text('grupo')->nullable();
            $table->text('url')->nullable();
            $table->date('fechavencimientocuota')->nullable();
            $table->text('situacioncuota')->nullable();
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
        Schema::dropIfExists('asistencias');
    }
}
