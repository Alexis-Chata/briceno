<?php

namespace App\Http\Controllers;

use App\Exports\AsistenciasExport;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use Maatwebsite\Excel\Facades\Excel;

class AsistenciasController extends Controller
{
    public function asistencia()
    {
        $alumnos = Asistencia::all();
        return view('alumnos.listado_asistencia')->with(compact('alumnos'));
    }

    public function exportCsv()
    {
        return Excel::download(new AsistenciasExport, 'Asistencias.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportExcel()
    {
        return Excel::download(new AsistenciasExport, 'Asistencias.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
