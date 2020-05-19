<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lugar;
use App\Municipio;
use App\Categoria;

class LugarController extends Controller
{
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
        $lugares = Lugar::where('municipioId', $id)->get();//obtengo los lugares que pertenecen al municipio 
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
        $lugares = Lugar::where('id', $id)->get();//Obtengo los lugares por su id
        return $lugares;
    }

    public function store(Request $request){//Función para el agregar:

        $datosLugar = request()->all();
        $datosLugar = request()->except('_token');

        if($request->hasFile('imagen')){
            $datosLugar['imagen']= $request->file('imagen')->store('uploads','public');
        }
        Lugar::insert($datosLugar);
        return back()->with('mensaje','Lugar agregado con exíto.');
    }

    public function editar($id){

        $lugar = Lugar::findOrFail($id);
        return view('admin.lugares_editar',compact('lugar'));
    }

    public function update(Request $request, $id){

        $lugarActualizado = Lugar::findOrFail($id);
        if($request->hasFile('imagen')){
            $lugarActualizado['imagen']= $request->file('imagen')->store('uploads','public');
            $lugarActualizado->imagen = $request->imagen;
        }
        $lugarActualizado->nombre = $request->nombre;
        $lugarActualizado->direccion = $request->direccion;
        $lugarActualizado->paginaWeb = $request->paginaWeb;
        $lugarActualizado->horario = $request->horario;
        $lugarActualizado->numTelefono = $request->numTelefono;
        $lugarActualizado->descripcion = $request->descripcion;
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
