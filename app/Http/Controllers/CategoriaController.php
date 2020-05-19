<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){//Consultar todos las categorias registrados:
        $categorias = Categoria::all();//Obtenemos todos las categorias de la bdd.
        return $categorias;//Lo pasamos ala vista con el metodo compact.
    }
}
