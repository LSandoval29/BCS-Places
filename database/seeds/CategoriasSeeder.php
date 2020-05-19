<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();
        $categoria->nombre = "Hotel";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Restaurante";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Cine";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Escuela";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Estadio";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Bar";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Supermercado";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Playa";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = "Club nocturno";
        $categoria->save();
        
    }
}
