<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
   protected $fillable = ['id','nombre'];

   public function lugares(){
      $municipioId = 'municipioId';
      return $this->hasMany(Lugar::class,$municipioId);//Un municipio puede tener muchos lugares
  }
}
