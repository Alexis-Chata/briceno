<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use DateTime;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

        if ($request) {
            $dni = $request->input('dni');
            $alumnos = Alumno::where('dni', $dni)->get();
            foreach ($alumnos as $alumno) {
                if($alumno->fechavencimientocuota){
                    $date = new DateTime($alumno->fechavencimientocuota);
                    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $alumno->fechavencimientocuota = date('d',$date->getTimestamp())." de ".$meses[date('n',$date->getTimestamp())-1]. " del ".date('Y',$date->getTimestamp()) ;
                }
            }
        }
        return view('consulta')->with(compact('alumnos'));
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
}
