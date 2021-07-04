<?php

namespace App\Imports;

use App\Models\Alumno;
use App\Models\Alumno_info_data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Alumno_info_datasImport implements ToModel, WithHeadingRow
{
    private $campo_id;
    private $campo;

    public function __construct($campo_id, $campo) {
        $this->campo_id = $campo_id;
        $this->campo = $campo;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $Alumno_id = Alumno::where('dni', $row['dni'])->get();

        if(isset($row[$this->campo])){
            return new Alumno_info_data([
                'alumno_id' => ($Alumno_id[0]->id),
                'alumno_info_field_id' => ($this->campo_id),
                'data' => ($row[$this->campo]),
                'dataformat' => (0),
            ]);
        }
        return null;
    }
}
