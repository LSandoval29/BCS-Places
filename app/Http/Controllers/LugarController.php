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
    //Funcion para hacer la consulta de los lugares que pertenecen a el municipio clickeado:
    public function getPlaces($id){
        $lugares = Lugar::where('municipioId', $id)->get();//obtengo los lugares que pertenecen al municipio 
        return $lugares;
    }
    //Funcion para hacer la consulta de los lugares que pertenecen a el municipio clickeado:
    public function getPlacesByMunicipio($id){
        $lugares = Lugar::where('municipioId', $id)->with('municipio')->get();//obtengo los lugares que pertenecen al municipio 
        return view('admin.lugares_crud',compact('lugares'));
    }

    //Funcion para obtener todos los lugares:
    public function getAllPlaces(){
        $places = Lugar::all();
        return $places;
    }

    public function getPlacesByCategory($id){
        $lugares = Lugar::where('categoriaId', $id)->get();//obtengo los lugares que pertenecen a la categoria
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
        
        return back()->with('mensaje','Lugar agregado con exíto.');
    }

    public function editar($id){

        $lugar = Lugar::findOrFail($id);
        return view('admin.lugares_editar',compact('lugar'));
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
        return back()->with('mensaje','Lugar actualizado con exíto.');


    }

    public function delete($id){

        $lugarEliminado = Lugar::findOrFail($id);

        $lugarEliminado->delete();

        return back()->with('mensaje','Lugar eliminado con exíto.');

    }
}
