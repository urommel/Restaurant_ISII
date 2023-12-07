<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipoBebida', 'precio', 'urlBebida'];

    // Cambiamos el nombre del método a urlBebidas y lo hacemos un Accessor
    public function getUrlBebidasAttribute()
    {
        return $this->imagen ? asset('storage/' . $this->urlBebida) : null;
    }
}
