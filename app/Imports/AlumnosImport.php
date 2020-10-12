<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // if (strtolower($row[1])=='fecha' || strtolower($row[9])=='importe') {
        //     return null;
        // }

        // if (isset($row['comprobante'])){
            return new Alumno([
                'dni' => strtoupper($row['dni']),
                'nombres' => strtoupper($row['nombres']),
                'apellidos' => strtoupper($row['apellidos']),
                'email' => strtoupper($row['email']),
                'campus1' => ($row['campus1']),
                'campus2' => ($row['campus2']),
                'campus3' => ($row['campus3']),
            ]);
        // }else{
        //     return null;
        // }

    }
}
