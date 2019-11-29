<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model

{
    protected $primaryKey = 'id';
    protected $fillable = [ 'Nombre', 'ApellidoP', 'ApellidoM', 'Posicion', 'Edad'];
    public $timestamps = false;

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


    public function Equipo()
    {
        return $this->belongsTo('App\Equipo');
    }
}
