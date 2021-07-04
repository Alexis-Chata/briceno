<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno_info_category;
use App\Models\Alumno_info_data;
use App\Models\Alumno_info_field;

class CamposAdicionales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Alumno_info_category::all()->sortBy("orden");
        $categorias2 = Alumno_info_field::all()->sortBy("orden");
        $numerofilas = Alumno_info_category::all()->count();
        $numerofilas2 = Alumno_info_field::all()->count();
        $camposid = Alumno_info_field::all()->where('alumno_info_category_id',2);
        //lo enviamos a clientes.index.blade con el arreglo
        return view('camposAdicionalesUsuario.index')
        ->with('categorias',$categorias)
        ->with('numerofilas',$numerofilas)
        ->with('categorias2',$categorias2)
        ->with('numerofilas2',$numerofilas2)
        ->with('camposid',$camposid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //nos permite returnar create.blade
          return view('camposAdicionalesUsuario.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearcampo($id)
    {
          //nos permite returnar create.blade
          $categorias = Alumno_info_category::all()->sortBy("orden");
          $scategoria = Alumno_info_category::find($id);
          return view('camposAdicionalesUsuario.createcampo')
          ->with('categorias',$categorias)
          ->with('scategoria',$scategoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);
        $campo = new Alumno_info_category(); //nos permite crear una instancia
        $numerofilas = Alumno_info_category::all()->count();
        $campo->nombre   = $request->get('nombre');
        $campo->orden   = $numerofilas+1;
        $campo->save();
        return redirect('/camposAdicionales');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        $request->validate([
            'shortname' => 'required|alpha_dash|unique:Alumno_info_fields,shortname',
            'name' => 'required'
        ]);

        $campo = new Alumno_info_field(); //nos permite crear una instancia
        $datos = Alumno_info_field::all();
        $numerofilas = Alumno_info_field::all()->count();
        /*inicio*/
        $campo->shortname = $request->get('shortname');//ya esta
        $campo->name = $request->get('name');//ya esta
        if ($request->get('descripcion') != null){$campo->descripcion = $request->get('descripcion');}
        else{$campo->descripcion = "";}
        $campo->required = $request->get('required');//ya esta
        $campo->locked = $request->get('locked');//ya esta
        $campo->forceunique = $request->get('forceunique');//ya esta
        $campo->signup = $request->get('signup'); //ya esta
        $campo->visible = $request->get('visible');//ya esta
        $campo->alumno_info_category_id = $request->get('alumno_info_category_id');//ya esta
        $ordennuevo = 0;
        for ($i = 0; $i < $numerofilas; $i++) {
            if($campo->alumno_info_category_id == $datos[$i]->alumno_info_category_id){
                $ordennuevo = $ordennuevo + 1;
            }
        }
        $campo->orden = $ordennuevo+1;//ya esta
        if ($request->get('defaultdata') != null){$campo->defaultdata = $request->get('defaultdata');}
        else {$campo->defaultdata = "";}
        $campo->datatype = 'text'; // ya esta
        if ($request->get('mtamaño') != null){$campo->param1 = $request->get('mtamaño');}
        else {$campo->param1 = "30";}
        if ($request->get('ltexto') != null){$campo->param2 = $request->get('ltexto');}
        else {$campo->param2 = "2048";}
        $campo->descripcionformat = 1;//ya esta
        $campo->defaultdataformat = 0;//ya esta
        $campo->param3 = $request->get('password');//ya esta
        if ($request->get('enlace') != null){$campo->param4 = $request->get('enlace');}
        else{$campo->param4 = "";}
        $campo->param5 = $request->get('tenlace');//ya esta
        /*fin*/
        $campo->save();
        return redirect('/camposAdicionales');
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
        $campos = Alumno_info_category::find($id);
        //return view('articulos.edit')->with('articulos',$articulos);
        return view('camposAdicionalesUsuario.edit')->with('campos',$campos);
    }
 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        $campos = Alumno_info_field::find($id);
        $categorias = Alumno_info_category::all()->sortBy("orden");
        //return view('articulos.edit')->with('articulos',$articulos);
        return view('camposAdicionalesUsuario.editcampo')
        ->with('campos',$campos)
        ->with('categorias',$categorias);
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
        $campo = Alumno_info_category::find($id);
        //$articulos = new Articulo();
        $campo->nombre   = $request->get('nombre');
        $campo->orden   = $request->get('orden');
        $campo->save();
        return redirect('/camposAdicionales');
    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        $request->validate([
            'shortname' => 'required|alpha_dash|unique:Alumno_info_fields,shortname,'.$id,
            'name' => 'required'
        ]);
        $datos = Alumno_info_field::all();
        $numerofilas = Alumno_info_field::all()->count();
        $campo = Alumno_info_field::find($id);

        //$articulos = new Articulo();
        /*inicio*/
        $campo->shortname = $request->get('shortname');//ya esta
        $campo->name = $request->get('name');//ya esta
        if ($request->get('descripcion') != null){$campo->descripcion = $request->get('descripcion');}
        else{$campo->descripcion = "";}
        $campo->required = $request->get('required');//ya esta
        $campo->locked = $request->get('locked');//ya esta
        $campo->forceunique = $request->get('forceunique');//ya esta
        $campo->signup = $request->get('signup'); //ya esta
        $campo->visible = $request->get('visible');//ya esta
        if($campo->alumno_info_category_id == $request->get('alumno_info_category_id')){
            $campo->orden = $campo->orden;//ya esta
        }
        else{
            $a = 0;
            for ($i = 0; $i < $numerofilas; $i++) {
                if($datos[$i]->alumno_info_category_id == $campo->alumno_info_category_id){
                    if($datos[$i]->orden > $campo->orden){
                    $dat = Alumno_info_field::find($datos[$i]->id);
                    $dat->orden   = ($datos[$i]->orden)-1;
                    $dat->save();
                }
                }

                if($datos[$i]->alumno_info_category_id == $request->get('alumno_info_category_id'))
                {
                    $a = $a +1;
                }
           }
        $campo->orden = $a+1;//ya esta
        }
        $campo->alumno_info_category_id = $request->get('alumno_info_category_id');//ya esta
        if ($request->get('defaultdata') != null){$campo->defaultdata = $request->get('defaultdata');}
        else {$campo->defaultdata = "";}
        $campo->datatype = 'text'; // ya esta
        if ($request->get('mtamaño') != null){$campo->param1 = $request->get('mtamaño');}
        else {$campo->param1 = "30";}
        if ($request->get('ltexto') != null){$campo->param2 = $request->get('ltexto');}
        else {$campo->param2 = "2048";}
        $campo->descripcionformat = 1;//ya esta
        $campo->defaultdataformat = 0;//ya esta
        $campo->param3 = $request->get('password');//ya esta
        if ($request->get('enlace') != null){$campo->param4 = $request->get('enlace');}
        else{$campo->param4 = "";}
        $campo->param5 = $request->get('tenlace');//ya esta
        /*fin*/
        $campo->save();
        return redirect('/camposAdicionales');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ecategoria = Alumno_info_category::find($id); //categoria a eliminar

        $categoria = Alumno_info_category::all(); //datos de la categorias
        $ncategoria= Alumno_info_category::all()->count(); //numero de filas en la categoria

        $campos = Alumno_info_field::all()->where('alumno_info_category_id',$id);

        for ($i = 0; $i < $ncategoria; $i++)
        {
        if($categoria[0]->id != $ecategoria->id){
        $torden = Alumno_info_field::all()->where('alumno_info_category_id',$categoria[0]->id)->count();
            foreach ($campos as $campos)
            {   $torden = $torden +1;
                $acampos= Alumno_info_field::find($campos->id);
                $acampos->alumno_info_category_id = $categoria[0]->id;
                $acampos->orden = $torden;
                $acampos->save();
            }
            $i = $ncategoria;
        }
        }
            //$i = $ncategoria;

        //esto para eliminar las categorias y ordenar
        for ($i = 0; $i < $ncategoria; $i++)
        {
            if($categoria[$i]->orden > $ecategoria->orden)
                {
                    $dat = Alumno_info_category::find($categoria[$i]->id);
                    $dat->orden   = ($categoria[$i]->orden)-1;
                    $dat->save();
                }
        }
        $ecategoria->delete();
        return redirect('/camposAdicionales');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy2($id)
    {
        //Eliminar campo indicado
        $campos = Alumno_info_field::find($id);
        //Ordenar campo indicado
        $numerofilas = Alumno_info_field::all()->count();
        $datos = Alumno_info_field::all();
        for ($i = 0; $i < $numerofilas; $i++) {
            if($datos[$i]->alumno_info_category_id == $campos->alumno_info_category_id){
                if($datos[$i]->orden > $campos->orden){
                $dat = Alumno_info_field::find($datos[$i]->id);
                $dat->orden   = ($datos[$i]->orden)-1;
                $dat->save();
            }
            }
        }
        $campos->delete();
        //eliminar los datos de la tabla datos
        $edatos = Alumno_info_data::all()->where('fieldid',$id);
        foreach($edatos as $edatos){
            $deliminar = Alumno_info_data::find($edatos->id);
            $deliminar->delete();
        }
        return redirect('/camposAdicionales');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $signo
     * @return \Illuminate\Http\Response
     */
    public function mover($id,$signo)
    {
        $numerofilas = Alumno_info_category::all()->count();
        $campos = Alumno_info_category::find($id);
        $datos = Alumno_info_category::all();
        if($signo == "+"){$campos->orden   = $campos->orden+1;}
        else{$campos->orden   = $campos->orden-1;}
        $campos->save();
        for ($i = 0; $i < $numerofilas; $i++) {
        if(($datos[$i]->orden == $campos->orden) && ($datos[$i]->id != $campos->id)){
            $dat = Alumno_info_category::find($datos[$i]->id);
            if($signo == "+"){$dat->orden   = $campos->orden-1;}
            else {$dat->orden   = $campos->orden+1;}
            $dat->save();
            break;
        }
        }
        //return view('articulos.edit')->with('articulos',$articulos);
        return redirect('/camposAdicionales');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $signo
     * @param  int  $categoriaid
     * @return \Illuminate\Http\Response
     */
    public function mover2($id,$categoria,$signo)
    {
        $numerofilas = Alumno_info_field::all()->count();
        $campos = Alumno_info_field::find($id);
        $datos = Alumno_info_field::all();
        if($signo == "+"){$campos->orden   = $campos->orden+1;}
        else{$campos->orden   = $campos->orden-1;}
        $campos->save();

        for ($i = 0; $i < $numerofilas; $i++) {
        if(($datos[$i]->orden == $campos->orden) && ($datos[$i]->id != $campos->id) && ($datos[$i]->alumno_info_category_id == $categoria)){
            $dat = Alumno_info_field::find($datos[$i]->id);
            if($signo == "+"){$dat->orden   = $campos->orden-1;}
            else {$dat->orden   = $campos->orden+1;}
            $dat->save();
            break;
        }
        }
        //return view('articulos.edit')->with('articulos',$articulos);
        return redirect('/camposAdicionales');
    }

}
