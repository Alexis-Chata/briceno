<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->text('campus1');
            $table->text('campus2')->nullable();
            $table->text('campus3')->nullable();
            $table->text('campus4')->nullable();
            $table->text('campus5')->nullable();
            $table->text('campus6')->nullable();
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
        Schema::dropIfExists('alumnos');
    }
}
