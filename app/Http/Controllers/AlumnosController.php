<?php

namespace App\Http\Controllers;

use App\Exports\AlumnosExport;
use App\Imports\AlumnosImport;
use Illuminate\Http\Request;
use App\Models\Alumno;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumnos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('alumnos.guardar');
        return view('alumnos.crear')->with(compact('action'));
        //return $action;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $Alumno = new Alumno($request->input());
        $Alumno->save();

        return redirect()->route('alumnos.index');
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

    public function buscar(Request $request)
    {
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

        if ($request->input('dni')) {
            $dni = $request->input('dni');
            $alumnos = Alumno::where('dni', $dni)->get();
            return view('alumnos.index')->with(compact('alumnos'));
        }
        return redirect()->route('alumnos.index');
    }

    #reglas de validacion
    private function _rules(){
        $messages = [
            'dni.required' => 'El dni es requerido',
            'dni.min' => 'Dni minimo 8 caracteres',
        ];

        $rules = [
            'dni' => 'required|min:8',
        ];

        return array($rules, $messages);
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

    public function importExcel(Request $request){
        $horror=$message="";
        $file = $request->file('file');
        if(isset($file)){
            try {
                Excel::import(new AlumnosImport, $file);
                $message="Importacion de Alumnos Completada";

            } catch (Exception $th) {
                $message="Error en importacion";
                //$horror = $th->getMessage();
                $horror = str_replace("Undefined index", "Falta la columna", $th->getMessage());
            }
        }else{
            $message="Por favor ingrese un archivo csv, con la informacion requerida";
        }
        return back()->with(compact('message', 'horror'));
    }

    public function exportExcel(){
        return Excel::download(new AlumnosExport, 'Alumnos.xlsx');
    }
}
