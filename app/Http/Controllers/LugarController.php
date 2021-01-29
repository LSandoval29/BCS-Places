<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lugar;
use App\Municipio;
use App\Categoria;

class LugarController extends Controller{

    public function index(){
        return view('admin.lugares_crear');
    }

    public function view_options(){
        return view('admin.options');
    }

    //Funcion para hacer la consulta de los lugares que pertenecen a el municipio clickeado:
    public function getPlaces($id){
        $lugares = Lugar::where('municipioId', $id)->get();//obtengo los lugares que pertenecen al municipio 
        return $lugares;
    }
    //Funcion para hacer la consulta de los lugares que pertenecen a el municipio clickeado:
    public function getPlacesByMunicipio($id){
        $categorias = Categoria::All();
        $municipios = Municipio::All();
        $municipio = Municipio::where('id', $id)->first();
        $lugares = Lugar::where('municipioId', $id)->with('municipio')->get();//obtengo los lugares que pertenecen al municipio 
        #return $municipio;
        return view('admin.lugares_crud',compact('lugares','categorias','municipios','municipio'));
    }

    //Funcion para obtener todos los lugares:
    public function getAllPlaces(){
        $places = Lugar::all();
        return $places;
    }

    public function getPlacesByCategory($idMunicipio,$idCategory){
        $lugares = Lugar::where('municipioId', $idMunicipio)->where('categoriaId',$idCategory)->get();//obtengo los lugares que pertenecen a la categoria y al municipio seleccionado
        return $lugares;
    }

    public function getPlacesById($id){
        $lugares = Lugar::where('id', $id)->with('categoria')->get();//Obtengo los lugares por su id
        return $lugares;
    }

    public function store(Request $request){//Función para el agregar:

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_places/',$name);
        }

        $lugar = new Lugar();
        $lugar->municipioId = $request->municipioId;
        $lugar->categoriaId = $request->categoriaId;
        $lugar->nombre = $request->nombre;
        $lugar->direccion = $request->direccion;
        $lugar->paginaWeb = $request->paginaWeb;
        $lugar->horario = $request->horario;
        $lugar->numTelefono = $request->numTelefono;
        $lugar->descripcion = $request->descripcion;
        $lugar->imagen = $name;
        $lugar->latitud = $request->latitud;
        $lugar->longitud = $request->longitud;

        $lugar->save();
        
        return back()->with('message','Lugar agregado con éxito!.');
    }

    public function editar($id){
        $categorias = Categoria::All();
        $municipios = Municipio::All();
        $lugar = Lugar::findOrFail($id);
        return view('admin.lugares_editar',compact('lugar','categorias','municipios'));
    }

    public function update(Request $request, $id){

        $lugarActualizado = Lugar::findOrFail($id);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();//Le ponemos el nombre a la imagen que recibimos, mas la fecha
            $file->move(public_path().'/images_places/',$name);//Movemos la imagen recibida a la carpeta images_places
        }else{
            $name = $lugarActualizado->imagen;
        }

        $lugarActualizado->municipioId = $request->municipioId;
        $lugarActualizado->categoriaId = $request->categoriaId;
        $lugarActualizado->nombre = $request->nombre;
        $lugarActualizado->direccion = $request->direccion;
        $lugarActualizado->paginaWeb = $request->paginaWeb;
        $lugarActualizado->horario = $request->horario;
        $lugarActualizado->numTelefono = $request->numTelefono;
        $lugarActualizado->descripcion = $request->descripcion;
        $lugarActualizado->imagen = $name;
        $lugarActualizado->latitud = $request->latitud;
        $lugarActualizado->longitud = $request->longitud;

        $lugarActualizado->save();
        return back()->with('message','Lugar actualizado con exíto.');


    }

    public function destroy($id){

        $lugarEliminado = Lugar::find($id);

            if($lugarEliminado){

                if($lugarEliminado->delete()){

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
