<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'compañia',
        'representante',
        'ruc',
        'celular',
        'direccion',
        'email',
        'estado',
        
    ];
}
