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
        return $this->urlBebida ? asset('storage/' . $this->urlBebida) : null;
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }
}
