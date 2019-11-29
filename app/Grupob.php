<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupob extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['Total', 'PG', 'PP', 'PE', 'PJ','GO'];
    public $timestamps = false;
}
