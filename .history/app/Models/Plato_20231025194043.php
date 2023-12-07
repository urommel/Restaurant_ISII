<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipoPlato', 'precio', 'urlPlato'];

    // Cambiamos el nombre del método a urlPlatos y lo hacemos un Accessor
    public function getUrlPlatosAttribute()
    {
        return $this->urlPlato ? asset('storage/' . $this->urlPlato) : null;
    }
}
