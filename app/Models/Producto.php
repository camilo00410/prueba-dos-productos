<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function entradas(){
        return $this->hasMany('App\Models\Entrada');
    }
    public function salidas(){
        return $this->hasMany('App\Models\Salida');
    }
}
