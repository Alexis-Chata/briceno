<?php

namespace App\Exports;

use App\Models\Alumno;
use Carbon\Traits\Date;
use Illuminate\View\View;
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
            'pagos' => Alumno::all()
        ]);
    }
    public function map($pago): array
    {
        return [
            Date::dateTimeToExcel($pago->fecha),
        ];
    }
}