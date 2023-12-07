<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipoPlato', 'precio', 'urlPlato', 'stock', 'categoria_id', 'disponible'];

    // Cambiamos el nombre del método a urlPlatos y lo hacemos un Accessor
    public function getUrlPlatosAttribute()
    {
        return $this->urlPlato ? asset('storage/' . $this->urlPlato) : null;
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    
}
