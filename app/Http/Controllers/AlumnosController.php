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
        $alumno = new Alumno();
        return view('alumnos.crear')->with(compact('action', 'alumno'));
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
        $Alumno->nombres = strtoupper($request->input('nombres'));
        $Alumno->apellidos = strtoupper($request->input('apellidos'));
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

    public function lista()
    {
        $alumnos = Alumno::all();
        return view('alumnos.listado')->with(compact('alumnos'));
    }

    public function buscar(Request $request)
    {
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

        if ($request->input('dni')) {
            $dni = $request->input('dni');
            $alumnos = Alumno::where('dni', $dni)->get();
            $eliminar = true;
            return view('alumnos.index')->with(compact('alumnos', 'eliminar'));
        }
        return redirect()->route('alumnos.index');
    }

    #reglas de validacion
    private function _rules()
    {
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
        $alumno = Alumno::find($id);
        $put = True;
        $action = route('alumnos.update', $id);

        return view('alumnos.actualizar')->with(compact('alumno', 'action', 'put'));
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
        $alumno = Alumno::find($id);
        $alumno->nombres = strtoupper($request->input('nombres'));
        $alumno->apellidos = strtoupper($request->input('apellidos'));
        $alumno->dni = $request->input('dni');
        $alumno->link = $request->input('link');
        $alumno->codigo = $request->input('codigo');
        $alumno->contrasena = $request->input('contrasena');
        $alumno->puntaje = $request->input('puntaje');
        $alumno->puesto = $request->input('puesto');
        $alumno->grupo = $request->input('grupo');
        $alumno->url = $request->input('url');
        $alumno->fechavencimientocuota = $request->input('fechavencimientocuota');
        $alumno->situacioncuota = $request->input('situacioncuota');
        $alumno->save();

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Alumno::find($id);
        $tarea->delete();
        return back();
    }

    public function truncate()
    {
        $alumno = Alumno::truncate();
        $msj = "Se eliminaron a todos los estudiantes";

        return view('alumnos.eliminar')->with(compact('alumno', 'msj'));
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        if (isset($file)) {
            try {
                Excel::import(new AlumnosImport, $file);

                $message = "Importacion de Alumnos Completada";
                $success = "true";

            } catch (Exception $th) {
                $message = "Error en importacion \n";
                //$message += $th->getMessage();
                if(isset($th->errorInfo[2])){
                    $message .= str_replace(["Undefined index", "Duplicate entry", "for key", "alumnos.alumnos_", "_unique"], ["Falta la columna", "Entrada duplicada", "para la clave", "", ""], $th->errorInfo[2]);
                }else{
                    $message .= str_replace(["Undefined index"], ["Falta la columna"], $th->getMessage());
                }
                $success = "false";
            }
        } else {
            $message = "Por favor ingrese un archivo csv, con la informacion requerida";
        }
        return view('import')->with(compact('message', 'success'));
    }

    public function exportCsv()
    {
        return Excel::download(new AlumnosExport, 'Alumnos.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function exportExcel()
    {
        return Excel::download(new AlumnosExport, 'Alumnos.xlsx');
    }
}
