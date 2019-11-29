<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function Equipo()
    {
        return $this->hasMany('App\Equipo');
    }
}


