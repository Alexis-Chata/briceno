<?php

namespace App\Exports;

use App\Models\Alumno;
use App\Models\Alumno_info_field;
use Carbon\Traits\Date;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class AlumnosExport implements FromView, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export', [
            'alumnos' => Alumno::all(),
            'alumno_info_fields' => Alumno_info_field::all()
        ]);
    }
    public function map($alumno): array
    {
        return [
            Date::dateTimeToExcel($alumno->fecha),
        ];
    }
}
