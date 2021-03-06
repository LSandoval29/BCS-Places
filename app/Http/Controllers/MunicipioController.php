<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//Consultar todos los municipios registrados:
        $municipios = Municipio::all();//Obtenemos todos los municipios de la bdd.
        $section_name = "Municipios";
        return view('admin.index',compact('municipios','section_name'));//Lo pasamos ala vista con el metodo compact.
        
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
        $municipio = Municipio::create($request->all());

        if($municipio){
          return redirect()->back()->with('message','Registro agregado con éxito');
        }
        return redirect()->back()->with('error','error servidor');
    }

    public function get($id)
    {
        $municipio = Municipio::where('id',$id)
                     ->first();

            if($municipio){

                return response()->json([
                    'message' => "Registro consultado correctamente",
                    'code' => 4,
                    'data' => $municipio
                ], 200);
            }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function show(Municipio $municipio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipio $municipio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $municipio = Municipio::where('id',$request->id)->first();

        if($municipio->update($request->all())){

            //Redireccion
            return redirect()->back()->with('message','Registro actualizado con éxito');

        }

        return redirect()->back()->with('error','error servidor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id);

            if($municipio){

                if($municipio->delete()){

                    return response()->json([
                        'message' => "Registro Eliminado correctamente",
                        'code' => 2,
                        'data' => null
                    ], 200);

                }
            }

            return response()->json([
                'message' => "No se ha podido eliminar",
                'code' => -2,
                'data' => null
            ], 200);
    }
    
}
