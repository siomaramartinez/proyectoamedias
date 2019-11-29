<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['NombreE', 'Nombre', 'ApellidoP', 'ApellidoM', 'Pago', 'Logo'];
    public $timestamps = false;

    public function getNombreEAttribute($value)
    {
        return strtoupper($value);
    }


    public function setApellidoPAttribute($value)
    {
        return $this->attributes['ApellidoP'] = ucfirst($value);
    }
    public function setApellidoMAttribute($value)
    {
        return $this->attributes['ApellidoM'] = ucfirst($value);
    }
    public function setNombreAttribute($value)
    {
        return $this->attributes['Nombre'] = ucfirst($value);
    }

    public function grupo()
    {
        return $this->belongsTo('App\Grupos');
    }

    public function Partidos()
    {
        return $this->belongsToMany('App\Partido')->withPivot('equipo2_id');
    }
   
    public function Integrantes()
    {
        return $this->hasMany('App\Integrante');
    }
    public function Grupoa()
    {
        return $this->belongsTo('App\Grupoa');
    }
   
}
