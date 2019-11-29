<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['Fecha_partido','Hora_partido'];
    
    public function equipos()
    {
        return $this->belongsToMany('App\Equipo')->withPivot('equipo2_id');
    }
  
}
