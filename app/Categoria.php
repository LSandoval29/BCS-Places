<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillablle = ['id', 'nombre'];


    public function lugares(){
        $categoriaId = 'categoriaId';
        return $this->hasMany(Lugar::class,$categoriaId);//Una categoria puede tener muchos lugares
    }
}
