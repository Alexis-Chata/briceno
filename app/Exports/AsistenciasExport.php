<?php

namespace App\Exports;

use App\Models\Asistencia;
use Carbon\Traits\Date;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class AsistenciasExport implements FromView, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('asistencias.export', [
            'asistencias' => Asistencia::all()
        ]);
    }
    public function map($asistencia): array
    {
        return [
            Date::dateTimeToExcel($asistencia->fecha),
            Date::dateTimeToExcel($asistencia->created_at),
        ];
    }
}
