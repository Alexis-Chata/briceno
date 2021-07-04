<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoInfoFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_info_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_info_category_id');
            $table->string('shortname',255);
            $table->longText('name');
            $table->longText('descripcion');
            $table->longText('param1');
            $table->longText('param2');
            $table->longText('param3');
            $table->longText('param4');
            $table->longText('param5');
            $table->longText('defaultdata');
            $table->string('datatype',255);
            $table->tinyInteger('descripcionformat');
            $table->tinyInteger('required');
            $table->tinyInteger('locked');
            $table->tinyInteger('forceunique');
            $table->tinyInteger('signup');
            $table->tinyInteger('defaultdataformat');
            $table->bigInteger('orden');
            $table->smallInteger('visible');
            $table->timestamps();

            $table->foreign('alumno_info_category_id')
                ->references('id')
                ->on('alumno_info_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_info_fields');
    }
}
