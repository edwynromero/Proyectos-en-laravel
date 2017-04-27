<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'Categoria';
     protected $primaryKey ='idcategoria';
      public $timestamps= false;

      protected $fillable =[
      'nombre',
      'descripcion',
      'condicion'


      ];

      protected $guarded =[
      
      ];


}
