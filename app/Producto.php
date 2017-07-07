<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'id_tipo',
        'descripcion'
    ];
}
