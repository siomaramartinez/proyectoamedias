<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupoa extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['Total', 'PG', 'PP', 'PE', 'PJ'];
    public $timestamps = false;

    public function Equipos()
    {
        return $this->hasMany('App\Equipo');
    }

}
