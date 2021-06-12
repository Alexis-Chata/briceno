<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateActualizarAsistenaciaTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE TRIGGER actualizar_asistencia_BU BEFORE UPDATE ON alumnos FOR EACH ROW
             BEGIN
             UPDATE asistencias SET dni=new.dni, nombres=new.nombres, apellidos=new.apellidos WHERE dni=old.dni;
             END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS actualizar_asistencia_BU');
    }
}
