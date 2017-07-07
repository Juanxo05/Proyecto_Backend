<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $primaryKey = 'id_empresas';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'id_servicio',
        'id_producto'

    ];
}
