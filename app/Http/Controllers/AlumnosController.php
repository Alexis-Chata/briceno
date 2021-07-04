<?php

namespace App\Http\Controllers;

use App\Exports\AlumnosExport;
use App\Imports\Alumno_info_datasImport;
use App\Imports\AlumnosImport;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Alumno_info_category;
use App\Models\Alumno_info_data;
use App\Models\Alumno_info_field;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

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
        $categorias = Alumno_info_category::all()->sortBy("orden");
        $infodatas = new Alumno_info_data();

        $action = route('alumnos.guardar');
        $alumno = new Alumno();
        return view('alumnos.crear')->with(compact('action', 'alumno', 'infodatas'))->with('categorias',$categorias);
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
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

        $Alumno = new Alumno($request->input());
        $Alumno->nombres = strtoupper($request->input('nombres'));
        $Alumno->apellidos = strtoupper($request->input('apellidos'));
        $Alumno->save();

        $fields = Alumno_info_field::all();
        foreach($fields as $field){
            $save_info_data = new Alumno_info_data();
            if($request->get("data$field->id") != null ){
                $save_info_data->alumno_id  = $Alumno->id;
                $save_info_data->alumno_info_field_id = $field->id;
                $save_info_data->data    = $request->get("data$field->id");
                $save_info_data->dataformat="0";
            $save_info_data->save();
            }
        }

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
        $alumno_info_fields = Alumno_info_field::all();
        return view('alumnos.listado')->with(compact('alumnos', 'alumno_info_fields'));
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
        $categorias = Alumno_info_category::all()->sortBy("orden");
        $infodatas = Alumno_info_data::all()->where('alumno_id',$id);

        return view('alumnos.actualizar')->with(compact('alumno', 'action', 'put', 'categorias', 'infodatas'));
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
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

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

        $fields = Alumno_info_field::all();
        foreach($fields as $field){
            if($request->get("data$field->id") != null ){
                Alumno_info_data::updateOrCreate(
                    ['alumno_id' => $alumno->id, 'alumno_info_field_id' => $field->id],
                    ['data' => $request->get("data$field->id"), 'dataformat' => 0]
                );
            }
            if($request->get("data$field->id") == null ){
                $null_info_data = Alumno_info_data::where(['alumno_id' => $alumno->id, 'alumno_info_field_id' => $field->id]);
                $null_info_data->delete();
            }
        }

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
        $alumno = DB::table('alumnos')->delete();
        $msj = "Se eliminaron a todos los estudiantes";

        return view('alumnos.eliminar')->with(compact('alumno', 'msj'));
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        if (isset($file)) {
            try {
                Excel::import(new AlumnosImport, $file);

                $encabezados = (new HeadingRowImport)->toArray($file);
                $info_fields = Alumno_info_field::all();
                foreach($info_fields as $info_field){
                    if(array_search(Str::slug($info_field->shortname),$encabezados[0][0])){
                        Excel::import(new Alumno_info_datasImport($info_field->id, Str::slug($info_field->shortname)), $file);
                    }
                }

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
