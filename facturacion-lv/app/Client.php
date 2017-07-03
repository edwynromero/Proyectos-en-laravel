<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function  findByName($q){
    	return $this->where('name','like', "%$q%")
    	->get();

    }
}
