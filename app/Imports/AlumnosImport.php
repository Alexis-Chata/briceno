<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnosImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Alumno([
            'dni' => ($row['dni']),
            'nombres' => strtoupper($row['nombres']),
            'apellidos' => strtoupper($row['apellidos']),
            'campus1' => ($row['link']),
            'campus2' => ($row['codigo']),
            'campus3' => ($row['contraseaa'] ?? $row['contrasea'] ?? $row['contrasena'] ?? $row['contraseña']),
            'campus4' => ($row['puntaje']),
            'campus5' => ($row['puesto']),
            'campus6' => ($row['grupo']),
        ]);
    }

}
