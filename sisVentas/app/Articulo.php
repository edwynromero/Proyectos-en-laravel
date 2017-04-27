<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'Articulo';
     protected $primaryKey ='idarticulo';
      public $timestamps= false;

      protected $fillable =[
      'idcategoria',
      'codigo',
      'nombre',
      'stock',
      'descripcion',
      'imagen',
      'estado'
      ];

      protected $guarded =[
      
      ];

}
