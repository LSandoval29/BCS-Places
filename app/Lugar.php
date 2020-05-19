<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{

    protected $fillable = ['id','municipioId','categoriaId','nombre','direccion','paginaWeb','horario','numTelefono','descripcion','imagen','latitud','longitud'];

    public function categoria(){//Uno a muchos:
        $categoriaId = 'categoriaId';
        return $this->belongsTo(Categoria::class,$categoriaId);//Un lugar pertenece a una categoria.
    }

    public function municipio(){
        $municipioId = 'municipioId';
        return $this->belongsTo(Municipio::class,$municipioId);//Un lugar pertenece a un municipio.
    }
} 
